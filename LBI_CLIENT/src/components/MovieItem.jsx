import React, { useEffect, useState } from "react";
import "../assets/style/MovieItem.css";
import loader from "../assets/img/loading.gif";
import { Link } from "react-router-dom";
import { fetchMovies } from "../assets/movies/movie";
import axios from "axios";
export default function MovieItem() {
    const [movie, setMovie] = useState([]);
    const [loading, setLoading] = useState(true);
    useEffect(() => {
        async function getMovie() {
            const data = await fetchMovies();
            setMovie(data);
            setLoading(false);
        }
        getMovie();
    }, []);
    console.log(movie);
    return (
        <div className="Movie_ctn">
            <div className="MovieItem_ctn">
                {!loading ? (
                    movie.map((movi) => {
                        return (
                            <Link to={`/movie/${movi.title}`} key={movi.id}>
                                <div className="MovieItem">
                                    {movi.poster && <img src={movi.poster} alt="affiche du film" className="poster" />}
                                    <p>{movi.title}</p>
                                </div>
                            </Link>
                        );
                    })
                ) : (
                    <b>
                        <img src={loader} alt="loader" className="loader" style={{ mixBlendMode: "color" }} />
                    </b>
                )}
            </div>
        </div>
    );
}
