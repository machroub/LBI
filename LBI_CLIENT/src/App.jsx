import "./App.css";
import Banner from "./components/Banner";
import Footer from "./components/Footer";
import Header from "./components/Header";
import MovieItem from "./components/MovieItem";
import SearchForm from "./components/SearchForm";
// import requests from "./config/requests";
import data from "./assets/movies/movie";
import { Route, Routes } from "react-router-dom";
import Home from "./pages/home";
import MovieDetail from "./components/MovieDetail";
function App() {
    return (
        <div>
            <Header />
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="movie/:title" element={<MovieDetail />} />
            </Routes>
        </div>
    );
}

export default App;
