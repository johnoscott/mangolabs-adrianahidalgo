function CreaSwf(img,wsize,hsize,opt){
    document.write("<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,22,0\" width=\""+wsize+"\" height=\""+hsize+"\">");
    document.write("<param name=\"movie\" value=\""+img+"\">");
    document.write("<param name=\"quality\" value=\"high\">");
    document.write("<param name=\"wmode\" value=\"transparent\">");
    if(opt != null){
        document.write("<param name='FlashVars' value='"+opt+"'>");
        alt="FlashVars="+opt;
        
    }
    document.write("<embed src=\""+img+"\" wmode=\"transparent\" "+alt+" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\""+wsize+"\" height=\""+hsize+"\"></embed>");
    document.write("</object>");
}