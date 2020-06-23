<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  version="1.0">
  <xsl:output method="html"/>

  <xsl:template match="/">
    <html>
      <head><title>transform</title></head>
      <body>
        <h1>My CDs</h1>
        
        <xsl:for-each select="//cd">
          <h2><xsl:value-of select="title"/></h2>
          <p>
            Country: <xsl:value-of select="@country"/>
            <br/>
            Artist: <xsl:value-of select="artist"/>
          </p>
        </xsl:for-each>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>
