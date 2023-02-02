<form action="{{$action}}" method="POST" class="was-validated">


 @isset($edit)
  @method('PUT')
  @endisset
  
  
 <h1> 
    @isset($edit)
      edit page
        @else
      create page
    @endisset  
</h1>
<div>
   @if($errors->any())
      @foreach($errors->all() as $error)
          <p class="text-danger" >{{$error}}</p>
      @endforeach
   @endif
</div>   

       

    @csrf
    <div class="mb-3 mt-3">
      <label for="clintsNumber">clintsNumber:</label>
      <input required    type="text" class="form-control"   id="clintsNumber" value="{{@$clintsNumber}}" name="clintsNumber">
    </div>
    <div class="mb-3">
      <label for="clintsName">clintsName:</label>
      <input required  minlength="3" type="text" class="form-control"  id="pwd" value="{{@$clintsName}}" name="clintsName">
      <p class="valid-feedback">Valid.</p>
      <p class="invalid-feedback">Must be more than 3 letter</p>
    </div>
    <div class="mb-3">
      <label for="contactLastName">contactLastName:</label>
      <input required type="text" class="form-control"  id="contactLastName" value="{{@$contactLastName}}" name="contactLastName">
    </div>
     <div class="mb-3">
      <label for="contactFirstName">contactFirstName:</label>
      <input required type="text" class="form-control"  id="pwd" value="{{@$contactFirstName}}" name="contactFirstName">
    </div>
    <div class="mb-3 mt-3">
      <label for="phone">phone:</label>
      <input required type="text" class="form-control"  id="phone" value="{{@$phone}}" name="phone">
    </div>
    <div class="mb-3 mt-3">
      <label for="addressLine1">addressLine1:</label>
      <input required type="text" class="form-control"  id="addressLine1" value="{{@$addressLine1}}" name="addressLine1">
    </div>
    <div class="mb-3 mt-3">
      <label for="addressLine2">addressLine2:</label>
      <input required type="text" class="form-control"  id="addressLine2" value="{{@$addressLine2}}" name="addressLine2">
    </div>
    <div class="mb-3 mt-3">
      <label for="city">city:</label>
       <input required type="text" class="form-control" id="city" value="{{@$city}}" name="city">
    </div>
     <div class="mb-3 mt-3">
      <label for="state">state:</label>
      <input required type="state" class="form-control" id="state" value="{{@$state}}" name="state">
    </div>
    <div class="mb-3 mt-3">
      <label for="postalCode">postalCode:</label>
      <input required type="text" class="form-control" id="postalCode" value="{{@$postalCode}}" name="postalCode">
        
    </div>
    <div class="mb-3 mt-3">
      <label for="country">country:</label>
      <input requiredx type="text" class="form-control" id="country" value="{{@$country}}" name="country">
    </div>
    
    <div class="form-floating ny-3">
      <select requiredx class="form-select" name="Repforsales" id="Repforsales">
        <option value="">[SALES-REP]</option>
        @if($sellers)
        @foreach($sellers as $seller)
        <option value="{{$seller->salesNumber}}">{{$seller->lastName}} {{$seller->firstName}}</option>
        @endforeach
        @endif 
      </select> 
      <label for="Repforsales">Repforsales:</label>
      
    </div>
    <div class="mb-3 mt-3">
      <label for="creditLimit">creditLimit:</label>
      <input  type="creditLimit" class="form-control" id="creditLimit"value =" {{@$creditLimit}}" name="creditLimit">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</div>

</form>
<!-- clintsNumber	int(11)			No	None			Change Change	Drop Drop	
	2	clintsName	varchar(50)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	3	contactLastName	varchar(50)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	4	contactFirstName	varchar(50)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	5	phone	varchar(50)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	6	addressLine1	varchar(50)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	7	addressLine2	varchar(50)	latin1_swedish_ci		Yes	NULL			Change Change	Drop Drop	
	8	city	varchar(50)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	9	state	varchar(50)	latin1_swedish_ci		Yes	NULL			Change Change	Drop Drop	
	10	postalCode	varchar(15)	latin1_swedish_ci		Yes	NULL			Change Change	Drop Drop	
	11	country	varchar(50)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	12	Repforsales	int(11)			Yes	NULL			Change Change	Drop Drop	
	13	creditLimit -->
