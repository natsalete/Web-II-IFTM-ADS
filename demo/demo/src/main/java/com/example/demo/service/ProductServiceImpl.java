package com.example.demo.service;

import java.util.List;
import java.util.Optional;
 
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
 
import com.example.demo.model.Product;
import com.example.demo.repository.ProductRepository;
 
 @Service
 public class ProductServiceImpl implements ProductService {
 
     @Autowired
     private ProductRepository productRepository;
 
     @Override
     public List <Product> getAllProducts(){
         return productRepository.findAll();
     }
 
     @Override
     public void saveProduct(Product product){
         this.productRepository.save(product);
     }
 
     @Override
     public Product getProductById(long id) {
         Optional < Product > optional = productRepository.findById(id);
         if (optional.isPresent()) {
             return optional.get();
         } else {
             throw new RuntimeException("Product not found with id: " + id);
         }
     }
 
     @Override
     public void deleteProductById(long id) {
         this.productRepository.deleteById(id);
     }
 
 }