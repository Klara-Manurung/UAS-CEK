const Province = require("../models/Province");

exports.getAllProvince = async(req,res)=>{
    const data = await Province.find();
    res.json(data);
};