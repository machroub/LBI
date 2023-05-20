import React from "react";
import MovieItem from "../components/MovieItem";
import data from "../assets/movies/movie";

export default function Home() {
    return (
        <div className="home">
            <MovieItem movies={data["lastSeen"]} listType="Vos derniers films vus" />
            <MovieItem movies={data["lastviewed"]} listType="Vos derniers films ajoutés" />
            <MovieItem movies={data["Best"]} listType="Vos meilleurs films" />
            <div className="test" style={{ background: "red", height: "100vh" }}>
                test
            </div>
        </div>
    );
}
