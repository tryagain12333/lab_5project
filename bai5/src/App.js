import logo from './logo.svg';
import './App.css';
import { useEffect, useState } from 'react';

function App() {
    const [api, setApi] = useState([]);

    useEffect(() => {
        fetch(
            `https://newsapi.org/v2/everything?q=apple&from=2022-12-21&to=2022-12-21&sortBy=popularity&apiKey=d75e70909a484e748b92fea77a856eec`,
        )
            .then((res) => res.json())
            .then((result) => {
                setApi(result.articles);
            });
    }, []);

    console.log(api);

    return (
        <div className="App">
            <body>
                <header>
                    <div className="navbar navbar-dark bg-dark shadow-sm">
                        <div className="container">
                            <a href="#" className="navbar-brand d-flex align-items-center">
                                <strong>Nguyễn Văn Hưng</strong>
                            </a>
                        </div>
                    </div>
                </header>

                <main>
                    <section className="py-5 text-center container">
                        <div className="row py-lg-5">
                            <div className="col-lg-6 col-md-8 mx-auto">
                                <h1 className="fw-light">Lấy Thông Tin Api</h1>
                                <p className="lead text-muted">
                                    Trang này sẽ lấy thông tin từ trang
                                    <a href="https://newsapi.org/"> https://newsapi.org/</a> với dữ liệu của "All
                                    articles mentioning Apple from yesterday, sorted by popular publishers first"
                                </p>
                            </div>
                        </div>
                    </section>

                    <div className="album py-5 bg-light">
                        <div className="container">
                            <div className="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                {api.map((value, index) => (
                                    <div className="col ">
                                        <div className="card shadow-sm">
                                            <img
                                                className="bd-placeholder-img card-img-top"
                                                width="100%"
                                                height="225"
                                                xmlns="http://www.w3.org/2000/svg"
                                                src={value.urlToImage}
                                                alt="ảnh"
                                            ></img>

                                            <div className="card-body">
                                                <p className="card-text">
                                                    <span className="label">Title:</span> {value.title}
                                                </p>
                                                <p className="card-text">
                                                    <span className="label">Description:</span> {value.description}
                                                </p>
                                                <p className="card-text">
                                                    <span className="label">Content:</span> {value.content}
                                                </p>
                                                <div className="d-flex justify-content-between align-items-center">
                                                    <div className="btn-group">
                                                        <button
                                                            type="button"
                                                            className="btn btn-sm btn-outline-secondary"
                                                        >
                                                            {value.author}
                                                        </button>
                                                    </div>
                                                    <small className="text-muted">{value.publishedAt}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </main>

                <footer className="text-muted py-5">
                    <div className="container">
                        <p className="float-end mb-1">
                            <a href="#">Back to top</a>
                        </p>
                        <p className="mb-1">Trường Đại học Tài nguyên và Môi trường Hà Nội</p>
                    </div>
                </footer>

                <script
                    src="/docs/5.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                    crossorigin="anonymous"
                ></script>
            </body>
        </div>
    );
}

export default App;
