const express = require("express");
const app = express();

app.use(express.json());

app.use("/api/auth",require("./routes/authRoutes"));
app.use("/api/mosques",require("./routes/mosqueRoutes"));
app.use("/api/donations",require("./routes/donationRoutes"));
app.use("/api/provinces",require("./routes/provinceRoutes"));
app.use("/api/admin",require("./routes/adminRoutes"));

module.exports = app;