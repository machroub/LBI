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
                <Route path="movies" element={<MovieItem movies={data["lastSeen"]} listType="Vos derniers films vus" />} />
                <Route path="movie/:id" element={<MovieDetail />} />
            </Routes>
        </div>
        // <>
        //     <Header />

        //     <div className="main">
        //         <MovieItem movies={data["lastSeen"]} listType="Vos derniers films vus" />
        //         <MovieItem movies={data["lastviewed"]} listType="Vos derniers films ajoutés" />
        //         <MovieItem movies={data["Best"]} listType="Vos meilleurs films" />
        //         {/* <Header />
        //     <Banner />
        //     <SearchForm />
        //     <Footer /> */}
        //     </div>
        // </>
    );
}

export default App;
