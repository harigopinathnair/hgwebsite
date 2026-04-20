<?php
// ONE-TIME USE: publish the Technical SEO guide. Delete after running.
require_once __DIR__ . '/db.php';

$title    = "What is Technical SEO? A Complete Guide for 2025";
$slug     = "what-is-technical-seo-complete-guide-2025";
$category = "Technical SEO";
$excerpt  = "Up to 40% of pages on average websites are never properly indexed — not because the content is poor, but because technical barriers stop Googlebot cold. This complete guide covers every pillar of technical SEO plus a 47-point audit checklist you can use immediately.";

$meta_title       = "What is Technical SEO? A Complete Guide for 2025";
$meta_description = "Learn what technical SEO is, why it matters in 2025, and how to audit your site with a 47-point checklist covering crawlability, Core Web Vitals, structured data, hreflang, and more.";
$meta_keywords    = "technical SEO guide, what is technical SEO, crawl budget, core web vitals, XML sitemap, robots.txt, canonical tags, structured data, technical SEO audit, site architecture, hreflang, redirect chains";
$schema_type      = "BlogPosting";

$content = <<<'HTML'
<p>You've published dozens of blog posts. You've done keyword research. You've written content that genuinely helps people. Yet your pages sit on page three of Google — invisible to the audience you're trying to reach.</p>

<p>The problem almost certainly isn't your content. It's what lives underneath it.</p>

<p>Technical SEO is the infrastructure layer of search engine optimisation — the foundational work that determines whether Google can even find, read, and rank your pages, before your content quality gets a chance to matter. Without it, every blog post you publish is a book stored in a library where no one knows the cataloguing system.</p>

<p>According to industry crawl studies, up to <strong>35–40% of pages on average websites are never properly indexed</strong> by search engines — not because the content is poor, but because technical barriers prevent Googlebot from processing them.</p>

<p>In 2025, this matters more than ever. Google's mobile-first indexing is now universal. Core Web Vitals are confirmed ranking signals. And AI Overviews preferentially pull content from sites that are technically clean, well-structured, and machine-readable.</p>

<blockquote><strong>What this guide covers:</strong> Every core pillar of technical SEO — crawlability, indexation, rendering, site architecture, Core Web Vitals, XML sitemaps, robots.txt, canonical tags, hreflang, structured data, and redirect chains — plus a 47-point audit checklist you can use immediately.</blockquote>

<h2>What is Technical SEO?</h2>

<p>Technical SEO is the process of optimising a website's infrastructure so that search engines can efficiently crawl, render, index, and rank its pages. Unlike on-page SEO — which focuses on content, keywords, and meta tags — technical SEO operates at the level of code, server configuration, and site architecture.</p>

<p>Think of it this way: on-page SEO is the book. Technical SEO is the library's cataloguing system, shelf organisation, and door that lets the librarian inside in the first place.</p>

<h2>The Three Pillars of Technical SEO</h2>

<p>Every technical SEO task falls under one of three fundamental pillars:</p>

<ul>
  <li><strong>Discoverability:</strong> Can Googlebot find and access your pages? This covers crawl paths, robots.txt, sitemaps, internal linking, and crawl budget.</li>
  <li><strong>Renderability:</strong> Can Google process and understand your pages once it finds them? This covers JavaScript rendering, page speed, Core Web Vitals, and mobile usability.</li>
  <li><strong>Rankability:</strong> Are your technical signals strong enough to compete? This covers structured data, canonical authority, hreflang precision, and redirect integrity.</li>
</ul>

<h3>Why Technical SEO Matters More in 2025</h3>

<ul>
  <li>Google's mobile-first index is universal — the mobile version of your site is indexed first, always</li>
  <li>Core Web Vitals (LCP, INP, CLS) are live ranking signals — slow sites are penalised, not just advised to improve</li>
  <li>AI Overviews and generative search engines preferentially cite structured, technically clean content</li>
  <li>JavaScript-heavy sites remain a major indexation risk — Googlebot processes JS in a two-wave system that delays ranking</li>
  <li>Site health scores directly affect crawl budget allocation — unhealthy sites get crawled less frequently</li>
</ul>

<h2>Technical SEO vs On-Page SEO: What's the Difference?</h2>

<p>One of the most common points of confusion in search marketing is where on-page SEO ends and technical SEO begins. The distinction matters because each discipline requires different skills, different tools, and often different team members.</p>

<table>
  <thead>
    <tr><th>Technical SEO</th><th>On-Page SEO</th></tr>
  </thead>
  <tbody>
    <tr><td>Focuses on site infrastructure</td><td>Focuses on page content</td></tr>
    <tr><td>Crawlability, indexation, rendering</td><td>Keywords, headings, meta tags</td></tr>
    <tr><td>Owned by developers and SEO engineers</td><td>Owned by content teams and copywriters</td></tr>
    <tr><td>XML sitemaps, robots.txt, schema</td><td>Title tags, meta descriptions, internal anchor text</td></tr>
    <tr><td>Site speed, Core Web Vitals, HTTPS</td><td>Content depth, E-E-A-T, readability</td></tr>
    <tr><td>Affects whether pages <em>can</em> rank</td><td>Affects what pages rank <em>for</em></td></tr>
  </tbody>
</table>

<p>The most important thing to understand: technical SEO doesn't replace on-page SEO. They work in sequence. Technical SEO creates the conditions for your content to be seen. Without it, no amount of perfectly crafted copy will get your pages in front of the right audience.</p>

<h2>Website Crawlability: How Googlebot Discovers Your Pages</h2>

<p>Before Google can rank a single page on your site, it first needs to find it. This process — called crawling — is how Googlebot discovers URLs by following links from page to page across the web.</p>

<p>A page that can't be crawled is effectively invisible to search engines, regardless of how well-written or keyword-optimised it is. Crawlability is the first gate every page must pass through.</p>

<h3>What Blocks Googlebot?</h3>

<p>Several common configurations prevent Googlebot from reaching your pages:</p>

<ul>
  <li>Disallow rules in robots.txt that block crawlers from entire sections of your site</li>
  <li>Noindex meta tags that tell Google to skip the page (but this requires crawling first to read the tag)</li>
  <li>Broken internal links that create dead ends in Googlebot's navigation path</li>
  <li>JavaScript-gated navigation that Googlebot can't process in the first crawl wave</li>
  <li>Login walls, session tokens, or geo-IP restrictions that block the crawler's IP</li>
</ul>

<h3>What is Crawl Budget and Why Does It Matter?</h3>

<p>Crawl budget is the number of pages Googlebot will crawl on your site within a given timeframe. Google doesn't crawl every page on every site every day — it allocates crawling resources based on a site's size, speed, authority, and overall health.</p>

<p>For most small to medium sites (under 1,000 pages), crawl budget isn't a constraint. But for e-commerce sites, news publishers, and any site with thousands of URLs — particularly those with faceted navigation, pagination, or session-ID parameters — crawl budget management is critical.</p>

<p><strong>How to use your crawl budget efficiently:</strong></p>
<ul>
  <li>Block low-value URLs from crawling via robots.txt: filtered category pages, search result pages, print versions, tracking parameters</li>
  <li>Fix redirect chains — every hop Googlebot takes through a chain consumes budget without landing on indexable content</li>
  <li>Remove or noindex duplicate content — Googlebot wasting budget on near-identical pages means your valuable content gets crawled less often</li>
  <li>Improve site speed — faster server response times allow Googlebot to crawl more pages per session</li>
  <li>Monitor your Crawl Stats report in Google Search Console to track crawl rate trends and identify sudden drops</li>
</ul>

<h3>Common Crawl Issues to Fix</h3>

<p>Run a crawl audit using Screaming Frog, Ahrefs Site Audit, or Semrush's Technical SEO Audit and look for:</p>

<ul>
  <li><strong>Broken internal links (4xx errors):</strong> dead ends that prevent Googlebot from discovering linked pages</li>
  <li><strong>Redirect chains:</strong> A → B → C paths that waste crawl budget and dilute link equity</li>
  <li><strong>Orphan pages:</strong> pages with no internal links pointing to them — Googlebot may never find them</li>
  <li><strong>Crawl depth exceeding 4 clicks from homepage:</strong> deep pages are crawled less frequently</li>
  <li><strong>Infinite crawl traps:</strong> calendar archives, infinite scroll, or parameter combinations that generate unlimited URLs</li>
</ul>

<blockquote><strong>Quick win:</strong> In Google Search Console, go to <em>Settings &gt; Crawl Stats</em>. If you see a drop in crawl rate that correlates with a traffic dip, crawlability is likely your primary issue. Check the 'Crawled pages by response' breakdown for 4xx and 5xx errors.</blockquote>

<h2>Indexation: Getting Your Pages Into Google's Database</h2>

<p>Crawling and indexing are not the same thing. Google can crawl a page and still choose not to add it to the index — meaning it will never appear in search results. Understanding why pages fail to index is one of the highest-leverage technical SEO skills.</p>

<h3>Why Pages Get Excluded from the Index</h3>

<p>Google excludes pages from the index for several reasons:</p>

<ul>
  <li><strong>Noindex directive:</strong> a meta robots tag or x-robots-tag HTTP header telling Google not to index the page</li>
  <li><strong>Thin or duplicate content:</strong> pages with minimal unique content that Google deems low-quality</li>
  <li><strong>Soft 404s:</strong> pages returning a 200 status code but displaying 'no results' or near-empty content</li>
  <li><strong>Blocked by robots.txt</strong> before Google can read the noindex tag (a common misconfiguration)</li>
  <li><strong>Canonical conflicts:</strong> a page canonicalising to another URL that is itself noindexed</li>
  <li><strong>Manual penalty</strong> or algorithm devaluation for quality or spam signals</li>
</ul>

<p>To identify excluded URLs, go to <em>Google Search Console &gt; Indexing &gt; Pages</em>. Review the 'Not indexed' tab — Google will show you the reason for exclusion for each URL.</p>

<h2>Site Architecture: Building for Crawl Efficiency and Topical Authority</h2>

<p>Site architecture refers to how your pages are organised and linked together. A well-structured site gives Googlebot clear pathways through your content — and signals topical authority through logical content groupings.</p>

<p><strong>The flat architecture principle:</strong></p>
<ul>
  <li>Every important page should be reachable within three clicks from the homepage</li>
  <li>Deeper pages receive less PageRank flow through internal linking and are crawled less frequently</li>
  <li>Use a logical URL hierarchy: <code>domain.com/category/subcategory/page-name</code> — each segment meaningful, no random strings</li>
</ul>

<p>Topical siloing — organising content into topic clusters — supports both indexation and topical authority:</p>
<ul>
  <li>A <strong>pillar page</strong> covers a broad topic comprehensively (e.g. 'Technical SEO Guide')</li>
  <li><strong>Cluster pages</strong> cover specific subtopics in depth (e.g. 'Core Web Vitals', 'XML Sitemaps', 'Crawl Budget')</li>
  <li>Internal links connect cluster pages back to the pillar and to each other — signalling deep topical coverage to Google</li>
</ul>

<h3>Canonical Tags: Solving Duplicate Content at Scale</h3>

<p>The canonical tag (<code>rel="canonical"</code>) tells Google which version of a page you consider the 'master' — the one that should be indexed and credited with any backlink equity.</p>

<p><strong>When to use canonical tags:</strong></p>
<ul>
  <li><strong>Pagination:</strong> canonicalise each page in a series to the first page (or use proper pagination markup)</li>
  <li><strong>URL parameters:</strong> a product page URL with tracking parameters (e.g. <code>?utm_source=email</code>) should canonical to the clean URL</li>
  <li><strong>Session IDs:</strong> session-specific URLs that create thousands of near-identical pages</li>
  <li><strong>Syndicated content:</strong> if you republish content elsewhere, canonical the syndicated copy back to the original</li>
  <li><strong>HTTPS vs HTTP:</strong> always canonical to the HTTPS version</li>
</ul>

<p><strong>Common canonical mistakes to avoid:</strong></p>
<ul>
  <li>Canonicalising to a noindexed URL (the canonical will be ignored)</li>
  <li>Chains of canonicals (A canonicals to B which canonicals to C) — Google may not honour them</li>
  <li>Using canonicals to consolidate pages that should be merged with 301 redirects instead</li>
</ul>

<h2>Page Rendering: How Google Sees and Scores Your Pages</h2>

<p>Once Googlebot crawls a page, it needs to render it — processing the HTML, CSS, and JavaScript to understand what the page actually contains. This step is where many modern sites run into invisible SEO problems.</p>

<h3>HTML vs JavaScript Rendering: What You Need to Know</h3>

<p>Google renders pages in two waves:</p>
<ul>
  <li><strong>First wave:</strong> Googlebot fetches and processes the raw HTML almost immediately</li>
  <li><strong>Second wave:</strong> JavaScript is rendered — but this can take days or weeks after the first crawl</li>
</ul>

<p>For sites built with React, Angular, Vue, or other JavaScript frameworks, this two-wave delay means your content may not be indexed for days after you publish it. The implications:</p>
<ul>
  <li><strong>Server-Side Rendering (SSR)</strong> is strongly preferred for SEO — the full HTML is delivered to Googlebot in the first wave</li>
  <li><strong>Client-Side Rendering (CSR)</strong> creates indexation delay and risks for dynamic content, navigation, and pagination</li>
  <li><strong>Hybrid approaches</strong> (Next.js, Nuxt.js with SSR) offer a good balance of performance and crawlability</li>
</ul>

<blockquote><strong>How to check:</strong> In Google Search Console, use the URL Inspection tool and click 'View Tested Page' &gt; 'Screenshot' to see how Google actually renders your page. If key content is missing from the screenshot, you have a rendering problem.</blockquote>

<h2>Core Web Vitals: The Ranking Signals You Can Measure</h2>

<p>Core Web Vitals are a set of user experience metrics that Google uses as ranking signals. As of 2025, three metrics form the Core Web Vitals:</p>

<table>
  <thead>
    <tr><th>Metric</th><th>What it measures</th><th>Good threshold</th><th>Poor threshold</th></tr>
  </thead>
  <tbody>
    <tr>
      <td><strong>LCP — Largest Contentful Paint</strong></td>
      <td>Load performance: when the main content is visible</td>
      <td>Under 2.5 seconds</td>
      <td>Over 4.0 seconds</td>
    </tr>
    <tr>
      <td><strong>INP — Interaction to Next Paint</strong></td>
      <td>Responsiveness: delay between user interaction and page response</td>
      <td>Under 200 ms</td>
      <td>Over 500 ms</td>
    </tr>
    <tr>
      <td><strong>CLS — Cumulative Layout Shift</strong></td>
      <td>Visual stability: how much page content unexpectedly shifts</td>
      <td>Under 0.1</td>
      <td>Over 0.25</td>
    </tr>
  </tbody>
</table>

<p>INP replaced FID (First Input Delay) as the interactivity metric in March 2024 — a significant change for sites that hadn't updated their performance monitoring.</p>

<p><strong>How to measure and improve Core Web Vitals:</strong></p>
<ul>
  <li><strong>PageSpeed Insights:</strong> provides both lab data (simulated) and field data (real user experience) for any URL</li>
  <li><strong>Google Search Console Core Web Vitals report:</strong> shows URL groups failing thresholds across your entire site</li>
  <li><strong>Chrome User Experience Report (CrUX):</strong> real-world field data aggregated from Chrome users</li>
  <li><strong>Web Vitals Chrome extension:</strong> measures vitals in real-time as you browse</li>
</ul>

<h3>Mobile-First Indexing: The Default That Most Sites Still Get Wrong</h3>

<p>Google's mobile-first index means Google primarily uses the mobile version of your content for indexing and ranking. This has been the default for all new and existing sites since 2023 — there is no longer a separate desktop-first index.</p>

<p><strong>What this means practically:</strong></p>
<ul>
  <li>If your mobile version has less content than your desktop version, Google only indexes the mobile content</li>
  <li>If your mobile site uses a different URL structure (m.example.com), you need consistent canonical tags on both versions</li>
  <li>Responsive design is strongly preferred over separate mobile URLs — it eliminates content parity issues entirely</li>
  <li>Check mobile usability in Google Search Console under <em>Experience &gt; Mobile Usability</em> for specific errors like 'Text too small to read' or 'Clickable elements too close together'</li>
</ul>

<h2>XML Sitemaps &amp; robots.txt: Directing the Crawl</h2>

<p>XML sitemaps and robots.txt are complementary tools for communicating with search engine crawlers. Sitemaps tell Googlebot where to go. robots.txt tells it where not to go. Together, they give you direct control over how your site is crawled.</p>

<h3>XML Sitemaps: Your Site's Roadmap for Googlebot</h3>

<p>An XML sitemap is a file that lists all the URLs on your site you want Google to find and consider for indexing. It's not a guarantee of indexation — Google will still apply its quality filters — but it significantly improves the speed and reliability of crawl discovery.</p>

<p><strong>XML sitemap best practices:</strong></p>
<ul>
  <li>Only include URLs you want indexed: no noindex pages, no thin content, no canonicalised duplicates</li>
  <li>Include the <code>&lt;lastmod&gt;</code> tag with accurate dates — Google uses this to prioritise recrawling of recently updated pages</li>
  <li>For large sites (over 50,000 URLs), use a sitemap index file that references multiple individual sitemaps</li>
  <li>Keep each sitemap under 50,000 URLs and 50MB uncompressed</li>
  <li>Submit your sitemap in Google Search Console under <em>Indexing &gt; Sitemaps</em> — this also gives you data on how many submitted URLs have been indexed</li>
  <li>Dynamic sitemaps (auto-generated by your CMS or plugin) are preferred over static files — they update automatically when pages are added or removed</li>
</ul>

<h3>robots.txt: Access Control for Crawlers</h3>

<p>robots.txt is a text file at the root of your domain (<code>example.com/robots.txt</code>) that tells web crawlers which pages or sections they are allowed or not allowed to crawl.</p>

<blockquote><strong>Critical distinction:</strong> robots.txt controls crawl access — it does NOT prevent indexation. Google can still index a URL it has never crawled if it finds that URL linked from another page. To prevent indexation, use a noindex directive on the page itself.</blockquote>

<p><strong>What to safely disallow:</strong></p>
<ul>
  <li><code>/wp-admin/</code>, <code>/admin/</code>, <code>/login/</code> — backend access areas</li>
  <li>URL parameters that generate duplicate content: <code>?sort=</code>, <code>?filter=</code>, <code>?sessionid=</code></li>
  <li>Thank-you pages, cart pages, checkout pages — no indexation value</li>
  <li>Development or staging URL paths that may be accessible on production</li>
</ul>

<p><strong>Dangerous robots.txt mistakes:</strong></p>
<ul>
  <li>Disallowing <code>/wp-content/</code> or <code>/assets/</code> — this blocks Googlebot from fetching CSS and JavaScript files it needs to render your pages</li>
  <li>Accidentally disallowing your entire site with <code>Disallow: /</code> — this does happen</li>
  <li>Relying on robots.txt to hide sensitive content — it's a public file, visible to anyone</li>
  <li>Not testing changes before deploying — use the robots.txt Tester in Google Search Console</li>
</ul>

<h2>Structured Data: Talking Directly to Search Engines</h2>

<p>Structured data is code you add to your pages that helps search engines understand the meaning and context of your content — not just its words. It's the difference between Google knowing your page contains the word 'recipe' and Google knowing it's a recipe for chocolate cake that takes 45 minutes and has 4.8 stars from 2,300 reviews.</p>

<p>The standard format: JSON-LD, embedded in a <code>&lt;script type="application/ld+json"&gt;</code> tag in the page <code>&lt;head&gt;</code>. Google prefers JSON-LD over Microdata and RDFa because it's easier to implement and doesn't require embedding in HTML content.</p>

<p><strong>High-impact schema types for 2025:</strong></p>
<ul>
  <li><strong>Article / BlogPosting:</strong> marks up blog content with author, date published, headline — supports E-E-A-T signals for AI search</li>
  <li><strong>FAQPage:</strong> formats question-and-answer content — can generate rich results in both traditional SERP and AI Overviews</li>
  <li><strong>HowTo:</strong> step-by-step instructional content — eligible for rich results in Google Search</li>
  <li><strong>Product:</strong> price, availability, reviews, brand — essential for e-commerce pages</li>
  <li><strong>BreadcrumbList:</strong> shows the site hierarchy in search results — improves CTR and navigational clarity</li>
  <li><strong>Person / Organization:</strong> author and brand entity markup — supports knowledge graph presence and AI citation</li>
</ul>

<p>In 2025, structured data has a dual benefit: it not only improves traditional rich results eligibility but also helps AI search engines like Google's AI Overview, Perplexity, and ChatGPT identify and cite your content more accurately. This makes it a critical component of any combined SEO and GEO strategy.</p>

<h2>Hreflang Tags: International SEO Done Right</h2>

<p>If your website serves users in multiple countries or languages, hreflang tags are non-negotiable. They tell Google which language and country version of a page to serve to which user — preventing duplicate content penalties across language variants and ensuring the right audience sees the right content.</p>

<h3>How Hreflang Works</h3>

<p>Hreflang attributes use a language-country code format (e.g. <code>en-US</code> for US English, <code>en-GB</code> for British English, <code>hi-IN</code> for Hindi in India). They can be implemented in three ways: in the <code>&lt;head&gt;</code> of each page, in your sitemap, or via HTTP headers.</p>

<p><strong>Critical hreflang rules:</strong></p>
<ul>
  <li><strong>Reciprocal implementation:</strong> every language variant must reference all other variants — including itself (self-referencing hreflang)</li>
  <li>Always include an <code>x-default</code> tag to specify the fallback version for users whose language isn't covered</li>
  <li>Hreflang tags on noindexed pages are ignored — don't add them to pages you're excluding from the index</li>
  <li>The pages referenced in hreflang tags must return 200 status codes — broken references are ignored</li>
</ul>

<p><strong>Common hreflang mistakes:</strong></p>
<ul>
  <li><strong>Missing x-default:</strong> without it, users with non-specified locales may land on incorrect versions</li>
  <li><strong>Incorrect locale codes:</strong> using 'uk' instead of 'en-GB' (uk is a valid country code but refers to Ukrainian, not United Kingdom)</li>
  <li><strong>Non-reciprocal implementation:</strong> if the en-US page references the en-GB version but en-GB doesn't reference en-US, Google may ignore both</li>
</ul>

<h2>Redirect Chains: The Silent Ranking Killer</h2>

<p>A redirect chain occurs when a URL redirects to another URL that itself redirects before reaching the final destination. Even a single intermediate hop creates compounding problems:</p>

<ul>
  <li><strong>Link equity loss:</strong> each redirect hop leaks approximately 10–15% of the PageRank being passed — a three-hop chain can lose 30% or more</li>
  <li><strong>Crawl budget waste:</strong> Googlebot has to follow every redirect in the chain before reaching indexable content</li>
  <li><strong>Latency:</strong> redirect chains add measurable load time for real users, negatively affecting Core Web Vitals</li>
</ul>

<p><strong>How to find and fix redirect chains:</strong></p>
<ul>
  <li>Use Screaming Frog (Spider &gt; Response Codes &gt; 3xx) or Ahrefs Site Audit to identify chains</li>
  <li>Update all internal links pointing to redirecting URLs to point directly to the final destination URL</li>
  <li>Contact referring domains with high-authority backlinks pointing to redirect chains — request direct link updates</li>
  <li>For 301 redirect chains caused by site migrations, consolidate into a single direct redirect from old URL to current URL</li>
</ul>

<h2>Technical SEO Checklist: 47 Audit Points for 2025</h2>

<p>Use this checklist to conduct a comprehensive technical SEO audit. Work through each group systematically — ideally with Google Search Console, Screaming Frog, and Ahrefs or Semrush open alongside.</p>

<h3>Group 1: Crawl &amp; Access (8 checks)</h3>
<ol>
  <li>Review robots.txt for any accidental Disallow rules blocking CSS, JS, or key page templates</li>
  <li>Check that your XML sitemap is submitted in Google Search Console and contains no errors</li>
  <li>Review the Crawl Stats report in GSC — look for drops in crawl rate or unusual response code distributions</li>
  <li>Verify that Google can fetch and render CSS and JS files (URL Inspection tool)</li>
  <li>Audit crawl depth — ensure all important pages are reachable within 3–4 clicks from the homepage</li>
  <li>Identify orphan pages (pages with zero internal links pointing to them)</li>
  <li>Check GSC Coverage report for crawl errors (4xx, 5xx response codes)</li>
  <li>For large sites: conduct a crawl budget analysis — identify low-value URLs consuming budget unnecessarily</li>
</ol>

<h3>Group 2: Indexation (7 checks)</h3>
<ol start="9">
  <li>Audit noindex tags — check for any pages that should be indexed but have accidental noindex directives</li>
  <li>Audit canonical tags — check for canonical chains, canonicals to noindexed pages, and incorrect self-references</li>
  <li>Identify duplicate content: URL parameter variations, session IDs, trailing slash vs no trailing slash versions</li>
  <li>Review GSC Index Coverage for 'Excluded' URLs — identify systematic exclusion issues</li>
  <li>Find and consolidate thin content pages (under 300 words, low engagement, no backlinks)</li>
  <li>Review pagination implementation — ensure paginated series are handled correctly</li>
  <li>Audit faceted navigation — identify parameter combinations creating indexation bloat</li>
</ol>

<h3>Group 3: Site Architecture (6 checks)</h3>
<ol start="16">
  <li>Audit URL structure — ensure logical hierarchy with no random strings, session IDs, or excessive depth</li>
  <li>Check click depth — map how many clicks it takes to reach each major page type from the homepage</li>
  <li>Review internal linking patterns — check for orphan pages, over-linked pages, and anchor text diversity</li>
  <li>Verify breadcrumb navigation — present on all interior pages, consistent with URL hierarchy, schema-marked up</li>
  <li>Check for and consolidate redirect chains — update internal links to point directly to final destination URLs</li>
  <li>Map content silos — ensure topical clusters are properly interlinked and connect back to pillar pages</li>
</ol>

<h3>Group 4: Page Speed &amp; Core Web Vitals (8 checks)</h3>
<ol start="22">
  <li>Measure LCP for key landing pages via PageSpeed Insights — target under 2.5 seconds</li>
  <li>Measure INP for key interactive pages — target under 200ms</li>
  <li>Measure CLS for all page types — target below 0.1</li>
  <li>Measure Time to First Byte (TTFB) — server response time should be under 800ms</li>
  <li>Audit image formats — ensure WebP or AVIF is used, images are properly sized, lazy loading implemented</li>
  <li>Identify and defer render-blocking JavaScript and CSS files</li>
  <li>Check font loading strategy — use <code>font-display: swap</code> to prevent invisible text during font load</li>
  <li>Review server and CDN configuration — enable compression, caching headers, and CDN for static assets</li>
</ol>

<h3>Group 5: Mobile (5 checks)</h3>
<ol start="30">
  <li>Verify mobile-first content parity — all content visible on desktop must be accessible on mobile</li>
  <li>Confirm site uses responsive design (not a separate m. subdomain) or that hreflang is correctly implemented for separate URLs</li>
  <li>Check tap target sizes — minimum 48×48 CSS pixels for all interactive elements</li>
  <li>Verify viewport meta tag is present on all pages: <code>&lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;</code></li>
  <li>Test font size legibility on mobile — minimum 16px body text to avoid 'Text too small to read' GSC error</li>
</ol>

<h3>Group 6: Structured Data (6 checks)</h3>
<ol start="35">
  <li>Implement Article or BlogPosting schema on all blog content — include author, datePublished, dateModified, headline</li>
  <li>Add FAQPage schema to any page containing question-and-answer content</li>
  <li>Implement appropriate schema for each major page type: Product, Service, LocalBusiness, Event as relevant</li>
  <li>Run all key page templates through Google's Rich Results Test — resolve all errors and warnings</li>
  <li>Check Google Search Console &gt; Enhancements for structured data errors across the full site</li>
  <li>Add BreadcrumbList schema to all interior pages and verify it matches the actual URL hierarchy</li>
</ol>

<h3>Group 7: International &amp; Security (7 checks)</h3>
<ol start="41">
  <li>Audit hreflang implementation — verify reciprocal references, correct locale codes, x-default present</li>
  <li>Confirm all pages with hreflang are indexable and returning 200 status codes</li>
  <li>Verify HTTPS is implemented across the entire site — no HTTP pages, no mixed content warnings</li>
  <li>Check HSTS (HTTP Strict Transport Security) header — ensures browsers enforce HTTPS connections</li>
  <li>Identify and fix mixed content: HTTPS pages loading HTTP resources (images, scripts, stylesheets)</li>
  <li>Check for canonical + hreflang conflicts — a page canonicalised to another URL should also have consistent hreflang</li>
  <li>In GSC: verify country targeting settings under Legacy Tools if using a generic TLD (.com, .net) for a specific country</li>
</ol>

<blockquote><strong>Pro tip:</strong> Run this audit quarterly for dynamic sites and twice yearly for stable content sites. A clean technical foundation doesn't stay clean — new pages, CMS updates, and developer deployments introduce technical issues continuously. Build the audit into your workflow.</blockquote>

<h2>Start Your Technical SEO Audit Today</h2>

<p>Technical SEO is not an advanced, optional layer reserved for enterprise sites. It is the foundational condition for every other SEO effort to work. Content strategy, link building, keyword research — all of it depends on Google being able to find, render, index, and trust your pages.</p>

<p>The three pillars — discoverability, renderability, and rankability — give you a mental framework for diagnosing any technical SEO problem. Before asking 'why isn't my content ranking?', ask: Can Google find my page? Can it render it? Are my technical authority signals intact?</p>

<p>In 2025, technical SEO has expanded beyond traditional search. The same signals that help Googlebot understand your site — structured data, clear architecture, authoritative content with entity markup — are the signals that help AI search engines like Perplexity, ChatGPT, and Google's own AI Overviews decide which sources to cite. <strong>A technically sound site is an AI-visible site.</strong></p>

<p>The 47-point checklist in this guide gives you everything you need to start. Pick the highest-priority group for your site — crawl and access issues have the broadest impact and are the right place to begin for most sites — and work through it systematically.</p>
HTML;

// Check for duplicate slug
$check = $pdo->prepare("SELECT id FROM posts WHERE slug = ?");
$check->execute([$slug]);
if ($check->fetch()) {
    die("Post with this slug already exists. Aborting.");
}

$stmt = $pdo->prepare("INSERT INTO posts
    (title, slug, category, excerpt, content, image_url, status,
     meta_title, canonical_url, meta_description, schema_type, meta_keywords, featured_image)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->execute([
    $title, $slug, $category, $excerpt, $content, '', 'published',
    $meta_title, '', $meta_description, $schema_type, $meta_keywords, ''
]);

$new_id = $pdo->lastInsertId();
echo "<h2>✓ Post published successfully</h2>";
echo "<p>ID: <strong>{$new_id}</strong></p>";
echo "<p><a href='single-post.php?slug={$slug}' target='_blank'>View live post →</a></p>";
echo "<p><a href='admin/post-form.php?id={$new_id}'>Edit in admin →</a></p>";
echo "<p style='color:red;margin-top:2rem;'><strong>Delete this file (publish-post.php) now.</strong></p>";
