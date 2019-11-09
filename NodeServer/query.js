function Query(connection){
    this.connection = connection;
    this.executeQuery = function(query,param=undefined) {
        return new Promise(function (data,error) {
            if(param===undefined){
                this.connection.query(query, (err, result) => {
                    if(err){
                        error(err);
                    }
                    data(result);
                });
            }else{
                this.connection.query(query, param, (err, result) => {
                    if(err){
                        error(err);
                    }
                    data(result);
                });
            }
        });
    }
    return this;
}

module.exports = Query;