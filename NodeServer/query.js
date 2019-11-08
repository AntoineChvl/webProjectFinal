module.exports = function (connection,query,param=undefined) {
    return new Promise(function (data,error) {
        if(param===undefined){
            connection.query(query, (err, result) => {
                if(err){
                    error(err);
                }
                data(result);
            });
        }else{
            connection.query(query, param, (err, result) => {
                if(err){
                    error(err);
                }
                data(result);
            });
        }
    });
}
