<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  version="1.0">
  <xsl:output method="html"/>

  <xsl:template match="/">
    <html>
      <head><title>transform</title></head>
      <body>
        <h1>My CD Collection</h1>
        
        <table border="1">
          <tr><th>Title</th><th>Artist</th></tr>
          
          <xsl:for-each select="catalog/cd">
            <tr>
              <td><xsl:value-of select="title" /></td>
              <td><xsl:value-of select="artist" /></td>
            </tr>
          </xsl:for-each>
        </table>       
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>
