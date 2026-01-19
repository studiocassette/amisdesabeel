import { cn } from "@/lib/utils";
import { Category, categories } from "@/data/mockData";

interface CategoryBadgeProps {
  category: Category;
  className?: string;
  size?: 'sm' | 'md';
}

export const CategoryBadge = ({ category, className, size = 'md' }: CategoryBadgeProps) => {
  const categoryInfo = categories[category];
  
  const colorClasses: Record<Category, string> = {
    sabeel: 'bg-sabeel text-sabeel-foreground',
    kairos: 'bg-kairos text-kairos-foreground',
    publications: 'bg-publications text-publications-foreground',
    prieres: 'bg-prieres text-prieres-foreground',
    videos: 'bg-videos text-videos-foreground',
    cornerstone: 'bg-cornerstone text-cornerstone-foreground',
  };

  return (
    <span
      className={cn(
        "inline-flex items-center rounded-full font-medium",
        size === 'sm' ? "px-2 py-0.5 text-xs" : "px-3 py-1 text-sm",
        colorClasses[category],
        className
      )}
    >
      {categoryInfo.label}
    </span>
  );
};
