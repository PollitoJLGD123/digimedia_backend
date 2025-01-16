const express = require("express")
const app = express()

const contactanosR = require("./contactanos.routes")

app.use("/contactanos", contactanosR)


module.exports = app