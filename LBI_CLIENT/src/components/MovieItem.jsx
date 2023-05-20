import React from "react";
import "../assets/style/MovieItem.css";
import { Link } from "react-router-dom";
export default function MovieItem({ movies, listType }) {
    return (
        <div className="Movie_ctn">
            <div>
                <h1>{listType}</h1>
            </div>
            <div className="MovieItem_ctn">
                {movies.map((movie) => {
                    return (
                        <Link to={`/movie/${movie.id}`} key={movie.id}>
                            <div className="MovieItem">
                                {movie.poster && <img src={movie.poster} alt="affiche du film" className="poster" />}
                                <p>{movie.title}</p>
                            </div>
                        </Link>
                    );
                })}
            </div>
        </div>
    );
}
