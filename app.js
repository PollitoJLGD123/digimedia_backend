const express = require("express")
const cors = require("cors")
const multer = require("multer")

const app = express()

app.use(express.urlencoded({extended: true, limit: "50mb"}))
// app.use(express.json({limit: "50mb"}))

app.use(cors())
app.use(multer().none())

const routes = require("./routes/index")
app.use("/api", routes)

module.exports = app