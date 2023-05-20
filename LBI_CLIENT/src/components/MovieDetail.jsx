import React from "react";
import "../assets/style/MovieDetail.css";
import { useParams } from "react-router-dom";
import data from "../assets/movies/movie";
export default function MovieDetail() {
    let movieId = useParams();
    let movie;

    if (movieId.id <= 19) {
        data["lastSeen"].map((movieData) => {
            if (movieData.id == movieId.id) movie = movieData;
        });
    } else if (movieId.id <= 29) {
        data["lastviewed"].map((movieData) => {
            if (movieData.id == movieId.id) movie = movieData;
        });
    } else {
        data["Best"].map((movieData) => {
            if (movieData.id == movieId.id) movie = movieData;
        });
    }

    return (
        <div className="Movie_ctn">
            <div>{movie.title}</div>
            <div className="MovieDetail">
                {movie.poster && <img src={movie.poster} alt="" />}
                <p>synopsis : {movie.synopsis}</p>
            </div>
        </div>
    );
}
