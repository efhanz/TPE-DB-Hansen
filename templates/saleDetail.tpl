{include file="header.tpl"}

<div class="container">

    <h1>{$titulo}</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col"> Transaction_ID</th>
                <th scope="col"> Customer</th>
                <th scope="col"> Product</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{$sale->Transaction_ID}</td>
                <td>{$sale->Customer}</td>
                <td>{$sale->Product}</td>
            </tr>
        </tbody>
    </table>


    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">Invoice#: {$sale->Invoice}</li>
            <li class="list-group-item">Date: {$sale->Date}</li>
            <li class="list-group-item">Seller: {$sale->Seller}</li>
            <li class="list-group-item">Quantity: {$sale->Quantity}</li>
            <li class="list-group-item">Unit_Price: {$sale->Unit_Price}</li>
            <li class="list-group-item">Amount: {$sale->Amount}</li>
        </ul>
    </div>


    <div class="container text-center btn-group dropdown">
        <button class="btn btn-secondary btn-lg " type="button" data-bs-toggle="dropdown" aria-expanded="true">
        - UPDATE THE SALE (if you're sure)-
        </button>
        <div class="dropdown-menu dropdown-menu-dark dropdown dropdown-menu-end">
          <form class="row gx-3 gy-2 align-items-center container dropdown-menu-end " action="updateSale/{$sale->Transaction_ID}" method="post">
            <div class="col-sm-3">
              <input type="text" name="customer" class="form-control" id="specificSizeInputName" placeholder="Customer">
            </div>
            <div class="col-sm-3">
              <input type="text" name="invoice" class="form-control" id="specificSizeInputName" placeholder="Invoice #">
            </div>
            <div class="col-sm-3">
              <input type="date" name="dates" class="form-control" id="specificSizeInputName" placeholder="Date">
            </div>
            <div class="col-sm-3">
              <label class="visually-hidden" for="specificSizeSelect">Preference</label>
              <select type="number" class="form-select" id="priority" name="seller">
                <option selected="">Choose Seller</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            <div class="col-sm-3">
              <input type="text" name="product" class="form-control" id="specificSizeInputName" placeholder="Product">
            </div>
            <div class="col-sm-3">
              <input type="number" name="quantity" class="form-control" id="specificSizeInputName" placeholder="Quantity">
            </div>
            <div class="col-sm-3">
              <input type="number" name="unitprice" class="form-control" id="specificSizeInputName"
                placeholder="Unit_Price">
            </div>
            <div class="col-sm-3">
              <input type="number" name="amount" class="form-control" id="specificSizeInputName" placeholder="Amount">
            </div>
    
            <div class="col-auto">
              <button type="submit" class="btn btn-dark">EDIT</button>
            </div>
          </form>
    
        </div>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button class="btn btn-outline-secondary"><a class="btn btn-secondary" href="showSales">On the top</a></button>
      <button class="btn btn-outline-secondary"><a class="btn btn-secondary" href="home">Home</a></button>
      </div>
  

</div>


{include file="footer.tpl"}