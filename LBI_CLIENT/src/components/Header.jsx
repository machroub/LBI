import React, { useState } from "react";
import "../assets/style/Header.css";
import viteLogo from "/vite.svg";
import Icon from "@mui/material/Icon";
import SearchIcon from "@mui/icons-material/Search";
import { Link } from "react-router-dom";
const Header = () => {
    const [navBlack, setNavBlack] = useState(false);

    const navTransition = (_) => {
        window.scrollY > 200 ? setNavBlack(true) : setNavBlack(false);
    };
    document.addEventListener("scroll", navTransition);
    return (
        <nav className={`${navBlack && "navblack nav"}`}>
            <img src={viteLogo} alt="" />
            <ul className="nav">
                <li className="nav__item">
                    <Link className="nav__item__action" to="/">
                        Accueil
                    </Link>
                </li>
                <li className="nav__item">
                    <Link className="nav__item__action" to="movies">
                        films
                    </Link>
                </li>
                <li className="nav__item">
                    <Link className="nav__item__action" to="movie/add">
                        ajouter un film
                    </Link>
                </li>
                <li className="nav__item">
                    <a className="nav__item__action" href="/">
                        rechercher <SearchIcon />
                    </a>
                </li>
            </ul>
        </nav>
    );
};

export default Header;
