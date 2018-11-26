<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" >
    <xsl:output method="xml" version="1.0" omit-xml-declaration="yes" indent="yes" media-type="text/html"/>

    <xsl:template match="/">
        <xsl:apply-templates select="rss/channel/item" />
    </xsl:template>

    <xsl:template match="item">
        <html>
            <body>
                <h2><xsl:apply-templates select="title" /></h2>
                <xsl:element name="a">
                    <xsl:attribute name="href">
                        <xsl:value-of select="link"/>
                    </xsl:attribute>
                    <xsl:attribute name="target">
                       "_blank"
                    </xsl:attribute>
                    Go To Article
                </xsl:element>
            </body>
            <br/>
            <br/>
        </html>
    </xsl:template>
</xsl:stylesheet>

