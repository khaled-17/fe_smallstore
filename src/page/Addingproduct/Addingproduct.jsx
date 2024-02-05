import React, { useState } from 'react'
 import { Link } from 'react-router-dom';
import { useEffect } from 'react';
 import { useFormik } from 'formik';
import * as Yup from 'yup';
import { useNavigate } from 'react-router-dom';

 import axios from 'axios';

 
    const Addingproduct = () => {
  
  const[productType,setproductType]=useState()
   const navigate = useNavigate();

  

  const [userData, setUserData] = useState({
    Size: "",
    weight:"",
    Width:"",
    height: "",
    length: "",
  });
  
  

   

  const validationSchema = Yup.object({
    sku: Yup.string().required('Please, submit required data'),
    name: Yup.string("Please, provide the data of indicated type").required('Please, submit required data'),
    price: Yup.string("Please, provide the data of indicated type").required('Please, submit required data'),
 

     productType: Yup.string()
     .required('  Switcher required ')
     .oneOf(['DVD', 'Book', 'Furniture'], 'Please, submit required data'),

     size: Yup.string().typeError("Please, provide the data of indicated type").when(['productType'], {
         is: "DVD",
         then: (schema) => schema.min(0).test('minCount', 'Please, submit required data', (value) => value >= 0),
         otherwise: (schema) => schema.min(0),
       }),
       weight: Yup.string().typeError("Please, provide the data of indicated type").when(['productType'], {
         is: (val) => val === 'Book',
         then: (schema) => schema.min(0).test('minCount', 'Please, submit required data', (value) => value >= 0),
         otherwise: (schema) => schema.min(0),
       }),
       Width: Yup.string().typeError("Please, provide the data of indicated type").when(['productType'], {
         is: (val) =>  val === 'Furniture',
         then: (schema) => schema.min(0).test('minCount', 'Please, submit required data', (value) => value >= 0),
         otherwise: (schema) => schema.min(0),
       }),


       height: Yup.string().typeError("Please, provide the data of indicated type").when(['productType'], {
         is: (val) =>  val === 'Furniture',
         then: (schema) => schema.min(0).test('minCount', 'Please, submit required data', (value) => value >= 0),
         otherwise: (schema) => schema.min(0),
       }),
       length: Yup.string().typeError("Please, provide the data of indicated type").when(['productType'], {
         is: (val) =>  val === 'Furniture',
         then: (schema) => schema.min(0).test('minCount', 'Please, submit required data', (value) => value >= 0),
         otherwise: (schema) => schema.min(0),
       }),


       
  
     
    
       

  });
 

//----------------------------
const formik = useFormik({
  initialValues: {
    sku: '',
    name: '',
    price: '',
    productType:'',

    size: '',
    weight: '',

    Width: '',
    height:'',
    length:""
     
   
  },
  validationSchema,
  onSubmit: (values) => {
    console.log('submit ');
    
    // console.log('sku:', values.sku);
    // console.log('name:', values.name);
    // console.log('price:', values.price);
     console.log("onsubit is run  ");

    // console.log('productAttributes:', productAttributes);
    senddata()
   },
});

 


const handleSendData =async () => {
   console.log("handleSendData is run  ");
 await formik.submitForm(); 

};

const senddata=async()=>{

  console.log("senddata is run  ");



  const dataopl={
    sku:formik.values.sku,
    name:formik.values.name,
    price:formik.values.price,
    productType:formik.values.productType,
    
  }
  
   
   
  
    try {
 
       const response = await axios.post("http://ramses.lovestoblog.com/backend/insert.php",
      { productAttributes:productAttributes, ...dataopl }
      
      
      );
  
      console.log( 'response.data');
      console.log( response.data);
      navigate('/')

     } catch (error) {
      console.error('Error adding product:', error);
     }
  

}


useEffect(()=>{
  console.log("product type change ");
  formik.values.size=""
  formik.values.weight=""
  formik.values.height=""
  formik.values.Width=""
  formik.values.length=""
 },[ formik.values.productType])



 const removeEmptyFields = (data) => {
  const productAttributes = {};
   Object.keys(data).forEach((key) => {
    const value = data[key];
    if (value !== '' && value !== null && value !== undefined) {
      productAttributes[key] = value;
    }
  });

  // console.log(productAttributes);

  return productAttributes;
};
const productAttributes = removeEmptyFields(userData);

useEffect(()=>{

setUserData({
    Size: formik.values.size,
   weight:formik.values.weight,
   Width:formik.values.Width,
   height: formik.values.height,
   length: formik.values.length,
})

},[ formik.values])



  return (
    <div > 
   <div className="header">
    <h1 className="pageName">Productlist .</h1>
     
    <div className="btnd">
        <button className='addbrodbtn' type="button" onClick={handleSendData}  >Save</button>
     <Link to="/">
      <button className='addbrodbtn' href="#hd">cancel </button>
  </Link>
    </div>
  </div>
<hr/>
 <div>
  <form id="product_form">

<div>
        <label className='label' htmlFor="sku">sku</label>
        <input
          type="text"
          id="sku"
          sku="sku"
          onChange={formik.handleChange}
          onBlur={formik.handleBlur}
          value={formik.values.sku}
        />
        {formik.touched.sku && formik.errors.sku ? (
          <div style={{ color: 'red' }}>{formik.errors.sku}</div>
        ) : null}
</div>


<div>
        <label className='label' htmlFor="name">name</label>
        <input
          type="text"
          id="name"
          name="name"
          onChange={formik.handleChange}
          onBlur={formik.handleBlur}
          value={formik.values.name}
        />
        {formik.touched.name && formik.errors.name ? (
          <div style={{ color: 'red' }}>{formik.errors.name}</div>
        ) : null}
</div>



<div>
productType
        <label className='label' htmlFor="price">price</label>
        <input
          type="text"
          id="price"
          name='price'
           onChange={formik.handleChange}
          onBlur={formik.handleBlur}
          value={formik.values.price}
        />
        {formik.touched.price && formik.errors.price ? (
          <div style={{ color: 'red' }}>{formik.errors.price}</div>
        ) : null}
</div>







 



 

<div style={{paddingTop:'30px'}}>

<label >Type Switcher</label>
<select
          
          onChange={formik.handleChange}
        onBlur={formik.handleBlur}
         name="productType"
         
        id="productType"
        defaultValue=""
  
 >
  <option id="productType" value=""></option>
  <option id="productType"  value="DVD">DVD</option>
  <option id="productType" value="Book">Book</option>
  <option id="productType" value="Furniture">Furniture</option>
</select>
 {formik.touched.productType && formik.errors.productType ? (
          <div style={{ color: 'red' }}>{formik.errors.productType}</div>
        ) : null}     
</div>


<div style={{borderStyle: 'solid', marginTop:"30px"}}>
  
  
  {formik.values.productType  === 'DVD' && (
          <div style={{margin:'10px'}} id='DVD' >
            <p>“Please, provide dimensions”</p>
            


        <label className='label' htmlFor="size">size</label>
        <input
           type="text"
           id="size"
           name="size"
           onChange={formik.handleChange}
           onBlur={formik.handleBlur}
           value={formik.values.size}
         />
       {formik.touched.size && formik.errors.size ? (
          <div style={{ color: 'red' }}>{formik.errors.size}</div>
        ) : null}     

            </div>
        )}   

         {formik.values.productType === 'Book' && (
          <div style={{margin:'10px'}} id='Book'>
            <p>“Please, provide weight” </p>
            
             <label className='label' htmlFor="weight">weight</label>
        <input
          type="text"
          id="weight"
          name='weight'
           onChange={formik.handleChange}
          onBlur={formik.handleBlur}
          value={formik.values.weight}
        />
        {formik.touched.weight && formik.errors.weight ? (
          <div style={{ color: 'red' }}>{formik.errors.weight}</div>
        ) : null} 

          </div>
        )}        

        {formik.values.productType === 'Furniture' && (
          <div style={{margin:'10px'}}  id='Furniture'>
            <p>“Please, provide size”</p>
            <div >


            <label htmlFor="height">Height</label>
            <input   
               type="text"
               id="height"
               name='height'
                onChange={formik.handleChange}
               onBlur={formik.handleBlur}
               value={formik.values.height}
            
            />
            {formik.touched.height && formik.errors.height ? (
          <div style={{ color: 'red' }}>{formik.errors.height}</div>
        ) : null}
            </div>



            <div>


            <label htmlFor="width">width</label>
            <input  
              type="text"
              id="width"
              name="Width"
               onChange={formik.handleChange}
              onBlur={formik.handleBlur}
              value={formik.values.Width}
           />
           {formik.touched.Width && formik.errors.Width ? (
          <div style={{ color: 'red' }}>{formik.errors.Width}</div>
        ) : null}
            </div>



            
            <div>


            <label htmlFor="length">Length</label>
            <input 
            type="text"
            id="length"
            name='length'
             onChange={formik.handleChange}
            onBlur={formik.handleBlur}
            value={formik.values.length}
            
            />
            {formik.touched.length && formik.errors.length ? (
          <div style={{ color: 'red' }}>{formik.errors.length}</div>
        ) : null}
            </div>
          </div>
        )}

</div>  



 </form>


</div>




    </div>
  )
}

export default Addingproduct;


// const [sku, setSku] = useState('');
// const [name, setName] = useState('');
// const [price, setPrice] = useState('');
// const [productAttribute, setProductAttribute] = useState('');





// useEffect(()=>{

//   setUserData({
//     Size: "",
//     Width: "",
//     height: "",
//     length: "",
//   })

// },[ productType])



// const handleSave =async () => {
//   formik.submitForm(); // تقديم البيانات عند الضغط على زر الإرسال خارج النموذج
 
  // try {
  //   const response = await Instance.post('http://localhost:8080/backend/insert.php', {
  //     sku,
  //     name,
  //     price,
  //     productType,
  //     productAttributes,
  //   });

  //   console.log( 'response.data');
   // } catch (error) {
  //   console.error('Error adding product:', error);
   // }


// };
