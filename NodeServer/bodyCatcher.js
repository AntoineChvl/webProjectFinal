module.exports = function (request, res) {
    return new Promise(function (data, error) {

            //create an empty body
            request.body = [];

            //push all data on the temporary body
            request.on('data', (chunk) => {
                request.body.push(chunk);

            }).on('end', () => {
                if (request.body.length > 0) {
                    //decode body
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
