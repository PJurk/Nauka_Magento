#Path to shops' active theme (multiple locations allowed, separated by a ' ' (SPACE))
THEME_FOLDER=('pub/static/frontend/Magento/luma/')

#Find deployed themes (languages) and copy the themes. 'us_US' becomes 'us_US_source'. We skip directories already having a '_source' suffix
find ${THEME_FOLDER[@]} -mindepth 1 -maxdepth 1 \( -not -name '*_source' \) -type d -execdir mv -f \{} \{}_source \;

#Find all *_source themes and use them as input for r.js. The output directories are the input directory with '_source' stripped again.
find ${THEME_FOLDER[@]} -mindepth 1 -maxdepth 1 \( -name '*_source' \) -type d -exec bash -c 'node_modules/.bin/r.js -o bundling.js baseUrl=\{} dir="${@%"_source"}"' bash {} \;

#Find the themes that don't have _source as suffix, assuming these are the ones that are now bundled.
#BUNDLED_THEMES=$(find ${THEME_FOLDER[@]} -mindepth 1 -maxdepth 1 \( -not -name '*_source' \) -type d);
