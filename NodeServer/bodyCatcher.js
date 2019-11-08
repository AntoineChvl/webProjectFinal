module.exports = function(request, res,callback){
    let body=[];
    request.on('data', (chunk) => {
        body.push(chunk);
    }).on('end', () => {
        body = JSON.parse(Buffer.concat(body).toString());
        callback(request, res,body);
    });
}
