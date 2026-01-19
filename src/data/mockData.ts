// Types
export type Category = 'sabeel' | 'kairos' | 'publications' | 'prieres' | 'videos' | 'cornerstone';

export interface Article {
  id: string;
  title: string;
  excerpt: string;
  content: string;
  date: string;
  category: Category;
  imageUrl?: string;
  author?: string;
  type?: string;
  externalLink?: string;
}

export interface Partner {
  id: string;
  name: string;
  description: string;
  logoUrl?: string;
  website: string;
  type: 'international' | 'french' | 'european';
}

export interface Prayer {
  id: string;
  title: string;
  date: string;
  content: string;
  excerpt: string;
}

// Documents Sabeel
export const sabeelDocuments: Article[] = [
  {
    id: 'sabeel-1',
    title: "Appel pour la paix et la justice en Terre Sainte",
    excerpt: "Un appel urgent de Sabeel Jérusalem pour une paix juste et durable, fondée sur le droit international et les résolutions de l'ONU.",
    content: "Contenu complet de l'appel...",
    date: "2024-01-15",
    category: 'sabeel',
    type: 'Appel',
    externalLink: "#"
  },
  {
    id: 'sabeel-2',
    title: "Analyse théologique de la situation actuelle",
    excerpt: "Une réflexion profonde sur les fondements théologiques de la libération et de la justice dans le contexte palestinien.",
    content: "Contenu complet de l'analyse...",
    date: "2024-01-08",
    category: 'sabeel',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'sabeel-3',
    title: "Communiqué : Situation humanitaire à Gaza",
    excerpt: "Sabeel Jérusalem exprime sa profonde préoccupation face à la crise humanitaire et appelle à une action internationale.",
    content: "Contenu complet du communiqué...",
    date: "2024-01-02",
    category: 'sabeel',
    type: 'Communiqué',
    externalLink: "#"
  },
  {
    id: 'sabeel-4',
    title: "Le rôle des Églises dans la résolution du conflit",
    excerpt: "Réflexion sur la responsabilité des communautés chrétiennes dans la promotion de la paix et de la réconciliation.",
    content: "Contenu complet...",
    date: "2023-12-20",
    category: 'sabeel',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'sabeel-5',
    title: "Déclaration sur les droits des réfugiés palestiniens",
    excerpt: "Rappel des droits inaliénables des réfugiés palestiniens conformément au droit international.",
    content: "Contenu complet...",
    date: "2023-12-15",
    category: 'sabeel',
    type: 'Communiqué',
    externalLink: "#"
  },
  {
    id: 'sabeel-6',
    title: "Spiritualité de la résistance non-violente",
    excerpt: "Exploration des racines spirituelles de la résistance pacifique dans la tradition chrétienne palestinienne.",
    content: "Contenu complet...",
    date: "2023-12-01",
    category: 'sabeel',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'sabeel-7',
    title: "Appel aux Églises du monde entier",
    excerpt: "Sabeel invite les Églises à prendre position pour la justice et à accompagner le peuple palestinien.",
    content: "Contenu complet...",
    date: "2023-11-20",
    category: 'sabeel',
    type: 'Appel',
    externalLink: "#"
  },
  {
    id: 'sabeel-8',
    title: "Réflexion sur Noël en Palestine",
    excerpt: "Comment célébrer la naissance du Prince de la Paix dans un contexte d'occupation et de conflit ?",
    content: "Contenu complet...",
    date: "2023-12-24",
    category: 'sabeel',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'sabeel-9',
    title: "Les murs de séparation : analyse biblique",
    excerpt: "Une lecture des Écritures à la lumière de la réalité des murs et barrières en Terre Sainte.",
    content: "Contenu complet...",
    date: "2023-11-10",
    category: 'sabeel',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'sabeel-10',
    title: "Témoignage chrétien en temps de crise",
    excerpt: "Comment les chrétiens de Terre Sainte vivent et témoignent de leur foi au quotidien.",
    content: "Contenu complet...",
    date: "2023-11-01",
    category: 'sabeel',
    type: 'Témoignage',
    externalLink: "#"
  },
  {
    id: 'sabeel-11',
    title: "L'occupation et ses conséquences psychologiques",
    excerpt: "Étude sur l'impact de l'occupation sur la santé mentale de la population palestinienne.",
    content: "Contenu complet...",
    date: "2023-10-15",
    category: 'sabeel',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'sabeel-12',
    title: "Déclaration pour la protection des lieux saints",
    excerpt: "Appel à la communauté internationale pour la protection des sites sacrés de Jérusalem.",
    content: "Contenu complet...",
    date: "2023-10-01",
    category: 'sabeel',
    type: 'Communiqué',
    externalLink: "#"
  },
  {
    id: 'sabeel-13',
    title: "Histoire du mouvement œcuménique palestinien",
    excerpt: "Retour sur les origines et le développement du dialogue interreligieux en Palestine.",
    content: "Contenu complet...",
    date: "2023-09-20",
    category: 'sabeel',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'sabeel-14',
    title: "Économie et justice sociale en Palestine",
    excerpt: "Analyse des défis économiques auxquels fait face la société palestinienne sous occupation.",
    content: "Contenu complet...",
    date: "2023-09-10",
    category: 'sabeel',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'sabeel-15',
    title: "Message pascal de Sabeel Jérusalem",
    excerpt: "Réflexion sur le mystère de Pâques dans le contexte de la souffrance et de l'espérance palestiniennes.",
    content: "Contenu complet...",
    date: "2023-04-09",
    category: 'sabeel',
    type: 'Message',
    externalLink: "#"
  },
];

// Documents Kairos
export const kairosDocuments: Article[] = [
  {
    id: 'kairos-1',
    title: "Kairos Palestine : Un moment de vérité",
    excerpt: "Le document fondateur du mouvement Kairos Palestine, appel des chrétiens palestiniens au monde.",
    content: "Contenu complet...",
    date: "2009-12-11",
    category: 'kairos',
    type: 'Document fondateur',
    externalLink: "#"
  },
  {
    id: 'kairos-2',
    title: "Réponse européenne à Kairos Palestine",
    excerpt: "Les Églises européennes répondent à l'appel de leurs frères et sœurs palestiniens.",
    content: "Contenu complet...",
    date: "2020-06-15",
    category: 'kairos',
    type: 'Kairos Europe',
    externalLink: "#"
  },
  {
    id: 'kairos-3',
    title: "Kairos pour la justice globale",
    excerpt: "Extension du mouvement Kairos aux questions de justice mondiale et de solidarité internationale.",
    content: "Contenu complet...",
    date: "2022-03-20",
    category: 'kairos',
    type: 'International',
    externalLink: "#"
  },
  {
    id: 'kairos-4',
    title: "10 ans de Kairos Palestine : Bilan et perspectives",
    excerpt: "Retour sur une décennie de mobilisation et réflexion sur les défis à venir.",
    content: "Contenu complet...",
    date: "2019-12-11",
    category: 'kairos',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'kairos-5',
    title: "Guide d'étude du document Kairos",
    excerpt: "Ressource pédagogique pour approfondir la compréhension du document Kairos Palestine.",
    content: "Contenu complet...",
    date: "2015-09-01",
    category: 'kairos',
    type: 'Ressource',
    externalLink: "#"
  },
  {
    id: 'kairos-6',
    title: "Kairos Sud-Africain et Kairos Palestine : Parallèles",
    excerpt: "Comparaison entre les deux mouvements Kairos et leurs contextes respectifs.",
    content: "Contenu complet...",
    date: "2018-05-15",
    category: 'kairos',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'kairos-7',
    title: "Les Églises françaises et Kairos Palestine",
    excerpt: "Comment les communautés chrétiennes de France ont reçu et relayé l'appel Kairos.",
    content: "Contenu complet...",
    date: "2021-11-20",
    category: 'kairos',
    type: 'France',
    externalLink: "#"
  },
  {
    id: 'kairos-8',
    title: "Théologie de la libération et Kairos",
    excerpt: "Les fondements théologiques du mouvement Kairos dans la tradition de libération.",
    content: "Contenu complet...",
    date: "2017-03-10",
    category: 'kairos',
    type: 'Analyse',
    externalLink: "#"
  },
  {
    id: 'kairos-9',
    title: "Appel de Kairos aux Nations Unies",
    excerpt: "Intervention du mouvement Kairos auprès des instances internationales.",
    content: "Contenu complet...",
    date: "2023-09-25",
    category: 'kairos',
    type: 'International',
    externalLink: "#"
  },
  {
    id: 'kairos-10',
    title: "Femmes palestiniennes et mouvement Kairos",
    excerpt: "Le rôle et la voix des femmes dans le mouvement Kairos Palestine.",
    content: "Contenu complet...",
    date: "2022-08-15",
    category: 'kairos',
    type: 'Analyse',
    externalLink: "#"
  },
];

// Publications
export const publications: Article[] = [
  {
    id: 'pub-1',
    title: "Actes du Colloque du 24 novembre 2023",
    excerpt: "Compte-rendu complet du colloque organisé par les Amis de Sabeel France sur le thème de la paix juste.",
    content: "Contenu complet...",
    date: "2024-01-10",
    category: 'publications',
    type: 'Actes de colloque',
    externalLink: "#"
  },
  {
    id: 'pub-2',
    title: "Comprendre la Palestine aujourd'hui",
    excerpt: "Brochure pédagogique pour mieux appréhender la situation en Palestine.",
    content: "Contenu complet...",
    date: "2023-06-15",
    category: 'publications',
    type: 'Brochure',
    externalLink: "#"
  },
  {
    id: 'pub-3',
    title: "Naim Ateek : Justice et réconciliation",
    excerpt: "Traduction française de l'ouvrage majeur du fondateur de Sabeel.",
    content: "Contenu complet...",
    date: "2020-03-20",
    category: 'publications',
    type: 'Livre traduit',
    externalLink: "#"
  },
  {
    id: 'pub-4',
    title: "Voix chrétiennes de Palestine",
    excerpt: "Anthologie de textes et témoignages de chrétiens palestiniens.",
    content: "Contenu complet...",
    date: "2021-09-01",
    category: 'publications',
    type: 'Anthologie',
    externalLink: "#"
  },
  {
    id: 'pub-5',
    title: "Guide de prière pour la Palestine",
    excerpt: "Recueil de prières et méditations pour accompagner spirituellement le peuple palestinien.",
    content: "Contenu complet...",
    date: "2022-04-10",
    category: 'publications',
    type: 'Guide spirituel',
    externalLink: "#"
  },
  {
    id: 'pub-6',
    title: "Étude : L'éducation en Palestine occupée",
    excerpt: "Analyse approfondie des défis du système éducatif palestinien.",
    content: "Contenu complet...",
    date: "2023-02-28",
    category: 'publications',
    type: 'Étude',
    externalLink: "#"
  },
  {
    id: 'pub-7',
    title: "Lexique du conflit israélo-palestinien",
    excerpt: "Définitions et explications des termes clés pour comprendre la situation.",
    content: "Contenu complet...",
    date: "2019-11-15",
    category: 'publications',
    type: 'Brochure',
    externalLink: "#"
  },
  {
    id: 'pub-8',
    title: "Rapport annuel 2023",
    excerpt: "Bilan des activités des Amis de Sabeel France pour l'année 2023.",
    content: "Contenu complet...",
    date: "2024-01-31",
    category: 'publications',
    type: 'Rapport',
    externalLink: "#"
  },
];

// Vagues de prières
export const prayers: Prayer[] = Array.from({ length: 35 }, (_, i) => ({
  id: `prayer-${i + 1}`,
  title: `Vague de prière - Semaine ${35 - i}`,
  date: new Date(2024, 0, 15 - i * 7).toISOString().split('T')[0],
  excerpt: "Prions pour la paix, la justice et la réconciliation en Terre Sainte...",
  content: `Seigneur, nous te confions le peuple de Palestine et d'Israël.
  
Dans cette semaine, nous prions particulièrement pour :
- Les familles touchées par la violence
- Les artisans de paix des deux côtés
- Les communautés chrétiennes de Terre Sainte
- Les responsables politiques

Que Ta paix règne sur cette terre bénie.

"Heureux les artisans de paix, car ils seront appelés fils de Dieu." (Matthieu 5:9)

Nous te prions, Seigneur, pour que la justice fleurisse et que la paix abonde.

Amen.`,
}));

// Partenaires
export const partners: Partner[] = [
  {
    id: 'partner-1',
    name: 'Sabeel Ecumenical Liberation Theology Center',
    description: 'Centre œcuménique de théologie de la libération à Jérusalem, organisation mère dont nous traduisons les documents.',
    website: 'https://sabeel.org',
    type: 'international',
  },
  {
    id: 'partner-2',
    name: 'Kairos Palestine',
    description: 'Mouvement de chrétiens palestiniens pour la justice et la paix.',
    website: 'https://www.kairospalestine.ps',
    type: 'international',
  },
  {
    id: 'partner-3',
    name: 'Friends of Sabeel UK',
    description: 'Organisation sœur au Royaume-Uni pour la diffusion des documents Sabeel.',
    website: 'https://friendsofsabeel.org.uk',
    type: 'european',
  },
  {
    id: 'partner-4',
    name: 'Pax Christi France',
    description: 'Mouvement catholique international pour la paix, partenaire sur les questions de Terre Sainte.',
    website: 'https://www.paxchristi.cef.fr',
    type: 'french',
  },
  {
    id: 'partner-5',
    name: 'AFPS - Association France Palestine Solidarité',
    description: 'Association française de solidarité avec le peuple palestinien.',
    website: 'https://www.france-palestine.org',
    type: 'french',
  },
  {
    id: 'partner-6',
    name: 'ACAT France',
    description: 'Action des Chrétiens pour l\'Abolition de la Torture, engagée sur les droits humains en Palestine.',
    website: 'https://www.acatfrance.fr',
    type: 'french',
  },
];

// Vidéos
export const videos: Article[] = [
  {
    id: 'video-1',
    title: "Conférence : Théologie de la libération en Palestine",
    excerpt: "Intervention du Père Naim Ateek lors du colloque de novembre 2023.",
    content: "",
    date: "2023-11-24",
    category: 'videos',
    type: 'Conférence',
    externalLink: "https://youtube.com"
  },
  {
    id: 'video-2',
    title: "Témoignage : Vivre à Bethléem aujourd'hui",
    excerpt: "Témoignage d'une famille chrétienne de Bethléem sur leur quotidien.",
    content: "",
    date: "2023-10-15",
    category: 'videos',
    type: 'Témoignage',
    externalLink: "https://youtube.com"
  },
  {
    id: 'video-3',
    title: "Documentaire : Les chrétiens de Terre Sainte",
    excerpt: "Portrait des communautés chrétiennes palestiniennes.",
    content: "",
    date: "2023-09-01",
    category: 'videos',
    type: 'Documentaire',
    externalLink: "https://youtube.com"
  },
  {
    id: 'video-4',
    title: "Entretien avec Michel Sabbah",
    excerpt: "L'ancien patriarche latin de Jérusalem partage sa vision de la paix.",
    content: "",
    date: "2023-06-20",
    category: 'videos',
    type: 'Entretien',
    externalLink: "https://youtube.com"
  },
  {
    id: 'video-5',
    title: "Webinaire : Comprendre Kairos Palestine",
    excerpt: "Présentation et discussion autour du document Kairos.",
    content: "",
    date: "2023-03-10",
    category: 'videos',
    type: 'Webinaire',
    externalLink: "https://youtube.com"
  },
];

// Tous les articles combinés
export const allArticles: Article[] = [
  ...sabeelDocuments,
  ...kairosDocuments,
  ...publications,
  ...videos,
];

// Fonction pour obtenir les articles récents
export const getRecentArticles = (count: number = 6): Article[] => {
  return [...allArticles]
    .sort((a, b) => new Date(b.date).getTime() - new Date(a.date).getTime())
    .slice(0, count);
};

// Fonction pour obtenir la prière de la semaine
export const getCurrentPrayer = (): Prayer => {
  return prayers[0];
};

// Fonction pour filtrer les articles par catégorie
export const getArticlesByCategory = (category: Category): Article[] => {
  return allArticles.filter(article => article.category === category);
};

// Catégories avec leurs métadonnées
export const categories = {
  sabeel: { label: 'Documents Sabeel', color: 'sabeel' },
  kairos: { label: 'Kairos', color: 'kairos' },
  publications: { label: 'Publications', color: 'publications' },
  prieres: { label: 'Vagues de prières', color: 'prieres' },
  videos: { label: 'Vidéos', color: 'videos' },
  cornerstone: { label: 'Cornerstone', color: 'cornerstone' },
} as const;
