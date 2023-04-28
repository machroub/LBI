import React, { useState } from "react";
import axios from "axios";
import requests from "../config/requests";
const SearchForm = () => {
    const [searchType, setSearchType] = useState("");
    const [searchRequest, setSearchrequest] = useState([]);

    const [result, setResult] = useState([]);
    const handlesubmit = (e) => {
        e.preventDefault();
        console.log(searchType);
        fetchMovies();
    };

    async function fetchMovies() {
        const request = await axios.get(requests.fetchMovies + "title=voyage");
        setResult(
            request.data[Math.floor(Math.random() * request.data.length - 1)]
        );
    }
    return (
        <div>
            <form onSubmit={handlesubmit}>
                <div>
                    <input
                        type="radio"
                        name="search-type"
                        id="search-type-all"
                        value="all"
                        onClick={(e) => {
                            setSearchType(e.target.value);
                        }}
                    />
                    <label htmlFor="search-type-all">tout</label>

                    <input
                        type="radio"
                        name="search-type"
                        id="search-type-title"
                        value="title"
                        onClick={(e) => {
                            setSearchType(e.target.value);
                        }}
                    />
                    <label htmlFor="search-type-title">titre</label>
                    <input
                        type="radio"
                        name="search-type"
                        id=""
                        value="people"
                        onClick={(e) => {
                            setSearchType(e.target.value);
                        }}
                    />
                    <label htmlFor="search-type-people">distribution</label>
                </div>
                {searchType == "people" && (
                    <input type="text" name="blabla" id="" placeholder="bla" />
                )}
                <input type="submit" value="soumettre votre formulaire" />
            </form>
            {result && result["title"]}
        </div>
    );
};

export default SearchForm;
