module.exports = function(request, res,callback){
    let body=[];
    request.on('data', (chunk) => {
        body.push(chunk);
    }).on('end', () => {
        console.log(body);
        body = JSON.parse(Buffer.concat(body).toString());
        console.log(body);
        callback(request, res,body);
    });
}
