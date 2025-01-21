const jwt = require("../services/jwt.service")

module.exports = (req, res, next) => {

    let token = req.headers.authorization;

    let user = jwt.data(token)

    if (user.id) {

        req.user = user
        next()

    } else {
        return res.send({
            status: 401,
            message: "Fallo de autenticación del token"
        })
    }

}
