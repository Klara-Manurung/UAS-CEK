const router = require("express").Router();
const {getAllProvince} = require("../controllers/provinceController");

router.get("/",getAllProvince);

module.exports = router;