module.exports = function (request, res) {
    return new Promise(function (data, error) {
            request.body = [];
            request.on('data', (chunk) => {
                request.body.push(chunk);
            }).on('end', () => {
                if (request.body.length > 0) {
                    request.body = JSON.parse(Buffer.concat(request.body).toString());
                    data();
                } else {
                    request.body = {};
                    data();
                }
            });
        }
    );
}
