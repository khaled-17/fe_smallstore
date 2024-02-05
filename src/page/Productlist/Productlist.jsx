import React from "react";
import "../../App.scss";
import { useEffect,useState } from "react";
import axios from 'axios';

 import { Link } from 'react-router-dom';
   const Productlist = () => {


  const [stateValue, setStateValue] = useState();
  const [ubdate, setubdate] = useState(1);

 
  useEffect(() => {
     axios.get('http://ramses.lovestoblog.com/backend/insert.php', { 
      params: { action: 'get' },
      
     })
       .then(response => {
        console.log(response.data);
        setStateValue(response.data)
       })
      .catch(error => {
        console.error('Error adding product:', error);
      });
  }, [ubdate]);
  

  const [selectedItems, setSelectedItems] = useState([]);

     const handleCheckboxChange = (itemId) => {
      const isSelected = selectedItems.includes(itemId);
  
      if (isSelected) {
        setSelectedItems((prevSelected) =>
          prevSelected.filter((id) => id !== itemId)
        );
      } else {
        setSelectedItems((prevSelected) => [...prevSelected, itemId]);
      }
    };

     


    const handleDelete =async () => {

      console.log('Deleting items:', selectedItems);

       
    
        
     
      try {
        
        const response = await axios.get('http://ramses.lovestoblog.com/backend/insert.php', {
            params: { action: 'delete', ids: selectedItems },  
         });
    
        console.log( response);
        console.log( 'response.data');
        console.log( response.data);
        console.log( 'response.data');

        setubdate((prev) => prev + 1);

       } catch (error) {
        console.error('Error adding product:', error);
       }
    
    
    };
    




if (!stateValue) {
 
  return(
    <div className="hellosass">
         <div className="header">
    <h1 className="pageName">Productlist.</h1>
    
    <div className="btn">
    <Link to="/add-product">
       <button >ADD</button>
  </Link>
      <button onClick={handleDelete} id="delete-product-btn" >MASS DELETE </button>
     </div>


  </div>

<hr/>
    <h1>finde ......</h1>
   </div>
  )


} 
else{



  return (
    <div className="hellosass">

 
    <div className="header">
    <h1 className="pageName">Productlist.</h1>
    
    <div className="btn">
    <Link to="/add-product">
       <button >ADD</button>
  </Link>
      <button onClick={handleDelete} id="delete-product-btn" >MASS DELETE</button>
    </div>


  </div>

<hr/>

<div className="products-container">    

 

 {stateValue.map((item, index) => (
          <div key={index} className="product">

<input        type="checkbox"
              className="delete-checkbox"
              checked={selectedItems.includes(item.id)}
              onChange={() => handleCheckboxChange(item.id)}
            />
         <div className="productDeltels">
           <p>{item.sku}</p>
           <p>{item.name}</p>
          <p>{item.price} $</p>
          <p>{item.product_type=='DVD'&&`Size : ${item.product_attribute} MB`}</p>
          <p>{item.product_type=='Book'&&`Weight : ${item.product_attribute}KG`}</p>
          <p>{item.product_type=="Furniture"&&`Dimensions : ${item.product_attribute}`}</p>
 
          
         </div>
      </div>
        ))}  
</div>
<hr/>
<div className="footer">
    scacndweb Test assigment
</div>
    </div>

  );

}

}


export default Productlist;
