function UITracker(baseWebServiceURL, method) {
    if (!baseWebServiceURL)
        this.baseWebServiceURL = 'http://localhost/uitracker/webservices/trackevent.php';
    else
        this.baseWebServiceURL = baseWebServiceURL;
    if (!method)
        this.method = 'POST';
    else
        this.method = method;

    this.trackEvent = function (category, action, label, value, userId, userToken) {
        var request = $.ajax({
            url: this.baseWebServiceURL,
            method: this.method,
            data: {
                category: category,
                action: action,
                label: label,
                value: value,
                userId: userId,
                userToken: userToken
            }
        });
        request.done(function (msg) {
            // console.log(JSON.stringify(msg));
        });
        request.done(function (jqXHR, textStatus) {
            // console.log(JSON.stringify(jqXHR));
            // console.log(JSON.stringify(textStatus));
        });
    };
}

// Construct the instace of the tracker passing the webservice URL
var UITracker = new UITracker(); //default instance