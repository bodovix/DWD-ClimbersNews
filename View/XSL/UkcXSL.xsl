<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" >
    <xsl:output method="xml" version="1.0" omit-xml-declaration="yes" indent="yes" media-type="text/html"/>

    <xsl:template match="/">
        <xsl:apply-templates select="rss/channel/item/title" />
        <xsl:apply-templates select="rss/channel/item/link" />
        <!-- ><xsl:apply-templates select="catalog/cd[6]/title" />  -->
        <!-- ><xsl:apply-templates select="catalog/cd[price>10]/title" /> -->
        <!-- ><xsl:apply-templates select="/catalog/cd[country='UK']/artist" /> -->
    </xsl:template>

    <xsl:template match="title">
        <xsl:value-of select="." /><br/>
    </xsl:template>

       <xsl:template match="link">
        <xsl:value-of select="." /><br/>
    </xsl:template>

   


</xsl:stylesheet>

