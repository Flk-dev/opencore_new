import Typograf from "typograf";

export default ( text: string ) => {
    const tp = new Typograf({locale: ['ru', 'en-US']});
   
    return tp.execute( text ); 
}