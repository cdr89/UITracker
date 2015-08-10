import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;

/**
 * UITracker java client
 * 
 * @author Domenico Rosario Caldesi <d.r.caldesi@gmail.com>
 * 
 * */
public class UITracker {

	public String baseWebServiceURL;
	public String method;

	public UITracker() {
		baseWebServiceURL = "http://localhost/uitracker/webservices/trackevent.php";
		method = "POST";
	}

	public UITracker(String baseWebServiceURL, RequestMethod requestMethod) {
		this.baseWebServiceURL = baseWebServiceURL;
		method = requestMethod.getValue();
	}

	public void trackEvent(String category, String action, String label,
			String value, String userId, String userToken) throws Exception {
		String paramsString = buildParamsString(category, action, label, value,
				userId, userToken);
		doRequest(paramsString);
	}

	public void trackEvent(String category, String action) throws Exception {
		String paramsString = buildParamsString(category, action, null, null,
				null, null);
		doRequest(paramsString);
	}

	private String buildParamsString(String category, String action,
			String label, String value, String userId, String userToken) {
		StringBuilder paramsString = new StringBuilder();

		if (category != null && category.length() > 0) {
			paramsString.append("category=");
			paramsString.append(encodeParam(category));
		}
		appendParam(paramsString, "action", action);
		appendParam(paramsString, "label", label);
		appendParam(paramsString, "value", value);
		appendParam(paramsString, "userId", userId);
		appendParam(paramsString, "userToken", userToken);
		// if (paramsString.length() > 0)
		// paramsString.insert(0, '?');

		return paramsString.toString();
	}

	private void appendParam(StringBuilder paramsString, String paramName,
			String param) {
		if (param != null && param.length() > 0) {
			if (paramsString.length() > 0)
				paramsString.append('&');
			paramsString.append(paramName);
			paramsString.append('=');
			paramsString.append(encodeParam(param));
		}
	}

	private void doRequest(String urlParameters) throws Exception {
		HttpURLConnection connection = null;
		try {
			// Create connection
			String urlString = baseWebServiceURL;
			if (method.equals("GET"))
				urlString += "?" + urlParameters;

			URL url = new URL(urlString);
			connection = (HttpURLConnection) url.openConnection();
			connection.setRequestMethod(method);

			if (method.equals("POST")) {
				connection.setRequestProperty("Content-Type",
						"application/x-www-form-urlencoded");
				connection.setRequestProperty("Content-Length",
						Integer.toString(urlParameters.getBytes().length));
				connection.setRequestProperty("Content-Language", "en-US");
			}

			connection.setUseCaches(false);
			connection.setDoOutput(true);

			if (method.equals("POST")) {
				// Send request
				DataOutputStream wr = new DataOutputStream(
						connection.getOutputStream());
				wr.writeBytes(urlParameters);
				wr.close();
			}

			// Get Response
			InputStream is = connection.getInputStream();
			BufferedReader rd = new BufferedReader(new InputStreamReader(is));
			StringBuilder response = new StringBuilder();
			String line;
			while ((line = rd.readLine()) != null) {
				response.append(line);
				response.append('\r');
			}
			rd.close();
			// System.out.println(response.toString());
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
			if (connection != null) {
				connection.disconnect();
			}
		}
	}

	private String encodeParam(String param) {
		try {
			return URLEncoder.encode(param, "UTF-8");
		} catch (UnsupportedEncodingException e) {
			e.printStackTrace();
			return param;
		}
	}

	/**
	 * RequestMethod enum
	 * 
	 * */
	public static enum RequestMethod {
		POST("POST"), GET("GET");

		private String value;

		public String getValue() {
			return value;
		}

		private RequestMethod(String value) {
			this.value = value;
		}
	}

	public static void main(String[] args) {
		try {
			// Default POST event tracking
			UITracker uiTracker = new UITracker();
			uiTracker.trackEvent("ANDROID_EVENT", "A_TAP");

			// Custom GET event tracking
			uiTracker = new UITracker(
					"http://localhost/uitracker/webservices/trackevent.php",
					UITracker.RequestMethod.GET);
			uiTracker.trackEvent("ANDROID_EVENT", "A_TAP", "request_type",
					"GET", null, null);
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

}