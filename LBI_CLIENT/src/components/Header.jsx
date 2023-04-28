import React, { useState } from "react";
import "./Header.css";
import viteLogo from "/vite.svg";
import Icon from "@mui/material/Icon";
import SearchIcon from "@mui/icons-material/Search";
const Header = () => {
    const [navBlack, setNavBlack] = useState(false);

    const navTransition = (_) => {
        window.scrollY > 200 ? setNavBlack(true) : setNavBlack(false);
    };
    useState(() => {
        document.addEventListener("scroll", navTransition);
    });

    console.log(navBlack);
    return (
        <nav className={`${navBlack && "navblack nav"}`} >
            <img src={viteLogo} alt="" />
            <ul className="nav">
                <li className="nav__item">
                    <a className="nav__item__action" href="/">
                        Accueil
                    </a>
                </li>
                <li className="nav__item">
                    <a className="nav__item__action" href="/">
                        films
                    </a>
                </li>
                <li className="nav__item">
                    <a className="nav__item__action" href="/">
                        categories
                    </a>
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
