function camelize(string) {
    string = string.toLowerCase().replace(/(?:(^.)|([-_\s]+.))/g, function(match) {
        return match.charAt(match.length-1).toUpperCase();
    });

    return string.replace(/([A-Z])/g, ' $1').trim();
}