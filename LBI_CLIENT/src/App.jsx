import "./App.css";
import Banner from "./components/Banner";
import Footer from "./components/Footer";
import Header from "./components/Header";
import SearchForm from "./components/SearchForm";
// import requests from "./config/requests";

function App() {
    return (
        <div className="main">
            <Header />
            <Banner />
            <SearchForm />
            <Footer />
        </div>
    );
}

export default App;
