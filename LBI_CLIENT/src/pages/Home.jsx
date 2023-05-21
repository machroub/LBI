import React from "react";
import MovieItem from "../components/MovieItem";
import data from "../assets/movies/movie";
import axios from "axios";
import { useEffect, useState } from "react";
export default function Home() {
    return (
        <div className="home">
            <MovieItem />
        </div>
    );
}
