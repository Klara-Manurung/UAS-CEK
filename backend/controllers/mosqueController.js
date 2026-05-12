const Mosque = require("../models/Mosque");

exports.createMosque = async(req,res)=>{
    const mosque = await Mosque.create(req.body);
    res.json(mosque);
};

exports.getAllMosques = async(req,res)=>{
    const mosques = await Mosque.find();
    res.json(mosques);
};

exports.getMosquesByProvince = async(req,res)=>{
    const mosques = await Mosque.find({
        province:req.params.province
    });
    res.json(mosques);
};

exports.getMosquesByCity = async(req,res)=>{
    const mosques = await Mosque.find({
        city:req.params.city
    });
    res.json(mosques);
};