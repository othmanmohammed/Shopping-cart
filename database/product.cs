using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Ci_cart
{
    #region Product
    public class Product
    {
        #region Member Variables
        protected int _product_id;
        protected int _category_id;
        protected string _product_name;
        protected unknown _product_price;
        protected string _product_image;
        #endregion
        #region Constructors
        public Product() { }
        public Product(int category_id, string product_name, unknown product_price, string product_image)
        {
            this._category_id=category_id;
            this._product_name=product_name;
            this._product_price=product_price;
            this._product_image=product_image;
        }
        #endregion
        #region Public Properties
        public virtual int Product_id
        {
            get {return _product_id;}
            set {_product_id=value;}
        }
        public virtual int Category_id
        {
            get {return _category_id;}
            set {_category_id=value;}
        }
        public virtual string Product_name
        {
            get {return _product_name;}
            set {_product_name=value;}
        }
        public virtual unknown Product_price
        {
            get {return _product_price;}
            set {_product_price=value;}
        }
        public virtual string Product_image
        {
            get {return _product_image;}
            set {_product_image=value;}
        }
        #endregion
    }
    #endregion
}