import React, { useEffect, useState } from "react";
import "../assets/style/MovieDetail.css";
import { useParams } from "react-router-dom";
import data from "../assets/movies/movie";
import axios from "axios";
export default function MovieDetail() {
    const movieTitle = useParams();
    const [movie, setMovie] = useState([]);

    async function fetchMovie() {
        const { data } = await axios.get(`https://localhost:8000/api/getMovies?title=${movieTitle.title}`);
        if (!data[0].poster) {
            const options = {
                method: "GET",
                url: `https://moviesdatabase.p.rapidapi.com/titles/search/title/${movieTitle.title}`,
                params: {
                    exact: "true",
                    titleType: "movie",
                },
                headers: {
                    "X-RapidAPI-Key": "706b49fed7mshbf7d0af62e6bb7bp1a0310jsnb62d9508089a",
                    "X-RapidAPI-Host": "moviesdatabase.p.rapidapi.com",
                },
            };
            const response = await axios.request(options);
            data[0].poster = response.data.results[0]?.primaryImage.url;
        }
        setMovie(data[0]);
    }

    useEffect(() => {
        fetchMovie();
    }, []);

    return (
        <div className="Movie_ctn">
            <div>{movie.title}</div>
            <div className="MovieDetail">
                {movie.poster && <img src={movie.poster} alt="" className="poster" />}
                <div>{`duration :${movie.duration} minutes`}</div>
                <p>synopsis : {movie.synopsis}</p>
            </div>
        </div>
    );
}
