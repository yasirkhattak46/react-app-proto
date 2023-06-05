import {useParams} from "react-router-dom";

export default function Dynamic() {
    let { id, page } = useParams();
    return <div className="container">
        <div className="row my-5">
            <div className="col-md-8 mx-auto">
                <h1> Dynamic id = {id}</h1>
                <h1> Dynamic page = {page}</h1>
            </div>
        </div>
    </div>;
}
