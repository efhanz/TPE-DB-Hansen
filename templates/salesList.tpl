{include file="header.tpl"}

<div class="container">

  <h2>{$titulo1}</h2>

  {* <form action="createProducts" method="POST">

        <input type="text" class="form-control" name="Id_categoria" id="Id_categoria" placeholder="Id Categoria">
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del producto">
        <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio">
        <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock">
        <input type="submit" class="form-control" value="Guardar">

</form> *}

  <div class="dropdown">
    <button class="btn btn-secondary btn-lg dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
    - SALES ADD -
    </button>
    <div class="dropdown-menu dropdown-menu-dark ">
      <form class="row gx-3 gy-2 align-items-center container " action="createSale" method="post">
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
          <button type="submit" class="btn btn-dark">Submit</button>
        </div>
      </form>

    </div>
  </div>

  

  <h2>{$titulo2}</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col"> Transaction_ID</th>
        <th scope="col">Customer</th>
        <th scope="col">Invoice#</th>
        <th scope="col">Date</th>
        <th scope="col">Seller</th>
        <th scope="col">Product</th>
        <th scope="col">Quantity</th>
        <th scope="col">Unit_Price</th>
        <th scope="col">Amount</th>
        <th scope="col">Delete</th>
        <th scope="col">Update</th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$sales item=$sale}
        <tr>
          <td><a href="saleDetail/{$sale->Transaction_ID}" class="btn btn-outline-success btn-sm">{$sale->Transaction_ID} - Display</a></td>
          <td>{$sale->Customer}</td>
          <td>{$sale->Invoice}</td>
          <td>{$sale->Date}</td>
          <td>{$sale->Seller}</td>
          <td>{$sale->Product}</td>
          <td>{$sale->Quantity}</td>
          <td>{$sale->Unit_Price}</td>
          <td>{$sale->Amount}</td>
          <td><a href="deleteSale/{$sale->Transaction_ID}" class="btn btn-outline-danger btn-sm">Delete</a></td>
          <td><a href="saleDetail/{$sale->Transaction_ID}" class="btn btn-outline-success btn-sm">Display/Update</a></td>
        </tr>
      {/foreach}
    </tbody>
  </table>

  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-outline-secondary"><a class="btn btn-secondary" href="showSales">On the top</a></button>
  <button class="btn btn-outline-secondary"><a class="btn btn-secondary" href="home">Home</a></button>
  </div>
</div>

{include file="footer.tpl"}