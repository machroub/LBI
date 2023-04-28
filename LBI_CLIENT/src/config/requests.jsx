const BASE_URL = "https://127.0.0.1:8000/api";

const requests = {
    fetchMovies: `${BASE_URL}/movies?`,
    // fetchMovieByPeople: `${BASE_URL}/${people}`,
    // fetchMovieByType: `${BASE_URL}/${type}`,
    // fetchMovieByDuration: `${BASE_URL}/${duration}`,
    // fetchPeoplesByMovie: `${BASE_URL}`,
};
export default requests;
