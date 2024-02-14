<h1> Hellooooooo</h1>
<form>
    <div class="mb-3">
        <label for="name_service" class="form-label">Service</label>
        <input class="form-control" list="datalistOptions" id="name_service" placeholder="Type to search...">

        <datalist id="datalistOptions">
            <option value="Mécanique">
            <option value="Carrosserie">
            <option value="Maintenance">
            <option value="Autres">
        </datalist>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<label for="exampleDataList" class="form-label">Datalist example</label>
<input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
<datalist id="datalistOptions">
    <option value="San Francisco">
    <option value="New York">
    <option value="Seattle">
    <option value="Los Angeles">
    <option value="Chicago">
</datalist>