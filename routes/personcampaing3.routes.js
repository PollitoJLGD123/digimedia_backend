const express = require("express")
const app = express()

const controller = require("../controllers/personcampañas3.controller")

app.get("/", controller.get)


module.exports = app