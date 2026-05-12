const router = require("express").Router();
const {
createMosque,
getAllMosques,
getMosquesByProvince,
getMosquesByCity
} = require("../controllers/mosqueController");

router.post("/",createMosque);
router.get("/",getAllMosques);
router.get("/province/:province",getMosquesByProvince);
router.get("/city/:city",getMosquesByCity);

module.exports = router;