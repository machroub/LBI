import React from "react";
import { useState, useEffect } from "react";
import "../assets/style/Banner.css";
import axios from "axios";
import requests from "../config/requests";

axios.defaults.headers.common["Accept"] = "application/json";
axios.defaults.headers.put["Content-Type"] = "application/json";
axios.defaults.headers.get["Content-Type"] = "application/json";
axios.defaults.headers.post["Content-Type"] = "application/json";
axios.defaults.headers.delete["Content-Type"] = "application/json";

const Banner = () => {
    const [movie, setMovie] = useState([]);
    useEffect(() => {
        async function fetchMovies() {
            const request = await axios.get(requests.fetchMovies);

            setMovie(request.data[Math.floor(Math.random() * request.data.length - 1)]);
        }
        fetchMovies();
    }, []);

    console.log(movie);

    return (
        <div className="banner">
            <h1>bienvenue sur imdb</h1>

            <img src="" alt="à la une ?" />
            <p>{movie["title"]}</p>
            <p>{movie["duration"]}</p>
        </div>
    );
};

export default Banner;
