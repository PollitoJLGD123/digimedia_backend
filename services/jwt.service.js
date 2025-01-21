const jwtService = require("jsonwebtoken");
require('dotenv').config()

const passwordJWT = process.env.TOKEN_PASS;

module.exports = {
    token: (payload, time = "8h", password = passwordJWT) => {
        
        try {
            delete payload.contrasena  
        
            return jwtService.sign({data: payload}, password , { expiresIn: time });
        
        } catch (error) {

            return error
        }
    },

    data: (token, password = passwordJWT) => {

        
        try {
            
            return jwtService.verify(token, password).data;
        
        } catch (error) {
            return error
        }
    }
}

