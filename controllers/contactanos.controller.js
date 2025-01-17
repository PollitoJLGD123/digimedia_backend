const prisma = require("../orm")

module.exports = {
    get: (req, res) => {

        let body = req.params.page

        prisma.contactanos.findMany({
            skip: 10,
            take: 10 * 6,
        })
            .then((data) => {

                return res.json({
                    status: 200,
                    data: data,
                })
            }).catch(error => {
                return res.json({
                    status: 500,
                })
            })

    },
    create: (req, res) => {
        return res.json({
            adadad: "create"
        })
    },
    update: (req, res) => {
        return res.json({
            adadad: "update"
        })
    },
    delete: (req, res) => {
        return res.json({
            adadad: "delete"
        })
    }
}